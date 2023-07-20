<?php

namespace Modules\UserSite\Http\Controllers;

use App\Models\Amenities;
use App\Models\AmenitiesCategory;
use App\Models\BathroomItem;
use App\Models\BedType;
use App\Models\Country;
use App\Models\Facilities;
use App\Models\FoodType;
use App\Models\Hotel;
use App\Models\HotelBed;
use App\Models\HotelContact;
use App\Models\Notification;
use App\Models\Photocategory;
use App\Models\PropertyType;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\UserSite\Entities\HotelPhoto;

class PropertyController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function category()
    {
        $properties = PropertyType::active()->get();
        return view('usersite::property-category', compact('properties'));
    }

    /**
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function basicInfo(Request $request, $id)
    {
        $hotel_id = $id;
        $countries = Country::with('cities')->active()->get();
        $hotelDetail = Hotel::with('propertytype')->whereUuid($id)->first();

        $userId = auth()->user()->id;
        $hotelUserId = Hotel::where('UUID', $id)->select('user_id', 'id')->first();
        if ($userId == $hotelUserId->user_id) {
            $countries = Country::with('cities')->active()->get();
            $hotelDetail = Hotel::where('UUID', $id)->with('propertytype')->first();
            $hotelContacts = HotelContact::where('hotel_id', $hotelUserId->id)->get();
            return view('usersite::BasicInfo', compact('countries', 'hotelDetail', 'hotelContacts'));
        } else {
            return redirect()->back();
        }

        // return view('usersite::BasicInfo', compact('countries', 'hotelDetail'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function cities(Request $request)
    {
        $country = $request->country;
        $cities = Country::where('id', $country)->with('cities')->active()->get();
        return response()->json(['cities' => $cities]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function add_property(Request $request)
    {
        $userId = auth()->user()->id;
        $hotel = new Hotel();
        $hotel->property_id = $request->property;
        $hotel->user_id = $userId;
        $hotel->save();

        Hotel::where('id', $hotel->id)->update(['property_name' =>  'new-property-'.$hotel->UUID, 'slug' =>  'new-property-'.$hotel->UUID ]);
        Session::put('hotel', $hotel->id);
        return response()->json(['redirect_url' => route('basic-info', ['id' => $hotel->UUID])]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function property_submitUpdate(Request $request)
    {
        if ($request->hotelId) {
            $hotelId = $request->hotelId;
        } else {
            $hotelId = Session::get('hotel')->id;
        }
        $count = $request->count;

        $Hotel = Hotel::updateOrCreate(['UUID' => $hotelId], [
            'property_name' => $request->property_name,
            'description' => $request->description,
            'star_rating' => $request->star_rating,
            'street_addess' => $request->address,
            'address_line' => $request->address_line,
            'country_id' => $request->country,
            'city_id' => $request->city,
            'pos_code' => $request->zipcode,
        ]);

        $contacts = json_decode($request->get('contactDetail'));

        $contact_id = $request->contact_id;
        if ($contacts) {
            foreach ($contacts as $contact) {
                if ($contact->id != 0) {
                    $hotelContact = HotelContact::updateOrCreate(['UUID' => $contact->id], [
                        'name' => $contact->name,
                        'number' => $contact->phone,
                        'number_optinal' => $contact->phoneOptional,
                        'hotel_id' => $Hotel->id,
                    ]);
                } else {
                    $contact_id = '';
                    $hotelContact = HotelContact::updateOrCreate(['UUID' => $contact_id], [
                        'name' => $contact->name,
                        'number' => $contact->phone,
                        'number_optinal' => $contact->phoneOptional,
                        'hotel_id' => $Hotel->id,
                    ]);
                }
            }
        }
        if ($request->hotelId) {
            $rooms = Room::where('hotel_id', $Hotel->id)->get();

            if ($rooms->count() < 1) {
                return response()->json(['redirect_url' => route('layout-form', ['id' => $hotelId])]);
            } elseif ($rooms->count() == 1) {
                return response()->json(['redirect_url' => route('room-list', ['id' => $hotelId])]);
            } else {
                return response()->json(['redirect_url' => route('room-list', ['id' => $hotelId])]);
            }
        }
        return response()->json(['redirect_url' => route('room-list', ['id' => $hotelId])]);
    }

    /**
     * @param mixed $id
     * @param Request $request
     *
     * @return  \Illuminate\View\View
     */
    public function layout_pricing($id, Request $request)
    {
        $room_types = RoomType::active()->get();
        $beds = BedType::active()->get();
        $bathrooms = BathroomItem::active()->get();
        $hotel = Hotel::with('propertytype')->whereUuid($id)->first();
        $rooms = Room::with('roomlist')->where('hotel_id', $hotel->id)->get('id');
        $roomDetail = Room::where('id', $request->roomId)->first();

        if ($roomDetail) {
            $hotelBeds = HotelBed::where('room_id', $roomDetail->id)->get();
            return view('usersite::layout-pricing', compact('room_types', 'beds', 'bathrooms', 'hotel', 'rooms', 'roomDetail', 'hotelBeds'));
        }

        return view('usersite::layout-pricing', compact('room_types', 'beds', 'bathrooms', 'hotel', 'rooms', 'roomDetail'));
    }

    /**
     * @param mixed $id
     *
     * @return  \Illuminate\View\View
     */
    public function room_lists($id)
    {
        $hotel_id = $id;
        $hotels = Hotel::whereUuid($id)->first();
        $rooms = Room::with('roomlist')->where('hotel_id', $hotels->id)->get();

        return view('usersite::room-list', compact('rooms', 'hotels'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function layouts_add_update(Request $request)
    {
        $hotel_data = $request->hotelId;
        $hotel_id = Hotel::whereUuid($hotel_data)->first();
        $roomId = $request->roomId;

        $Room = Room::updateOrCreate(['UUID' => $roomId], [
            'smoking_policy' => $request->smoking_area,
            'custom_name_room' => $request->custom_name,
            'number_of_room' => $request->number_of_room,
            'guest_stay_room' => $request->number_of_guest,
            'room_size' => $request->room_size,
            'room_cal_type' => $request->room_size_feet,
            'bathroom_private' => $request->bathroom_private,
            'bathroom_item' => $request->bathroom_item,
            'price_room' => $request->bed_price,
            'room_list_id' => $request->room_name_select,
            'room_type_id' => $request->room_type,
            'discount' => $request->discountValue,
            'discount_type' => $request->discountType,
            'min_person_discount' => $request->personDis,
            'hotel_id' => $hotel_id->id,
        ]);

        $room_id = Room::latest('created_at')->take(1)->first();

        $beds = json_decode($request->get('BedDetail'));

        foreach ($beds as $bed) {
            $HotelBed = HotelBed::updateOrCreate(['id' => $bed->bedId], [
                'no_of_bed' => $bed->bedNo,
                'bed_id' => $bed->bed,
                'room_id' => $room_id->id,
            ]);
        }
        return response()->json(['redirect_url' => route('room-list', ['id' => $hotel_data])]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function room_list(Request $request)
    {
        $room_type_id = $request->room_type_id;
        $roomlist = RoomType::with('roomLists')->where('id', $room_type_id)->active()->get();
        return response()->json(['roomlist' => $roomlist]);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function facilities($id)
    {
        $facilities = Facilities::active()->get();
        $food_types = FoodType::active()->get();
        $hotelDetail = Hotel::whereUuid($id)->first();
        return view('usersite::facilities', compact('facilities', 'food_types', 'hotelDetail'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function facilities_add_update(Request $request)
    {
        $lang = explode(",", $request['language']);
        $language = join(",", array_unique($lang));
        $facilities = $request['facilities'];
        $hotel_id = $request->hotelId;

        $Hotel = Hotel::updateOrCreate(['UUID' => $hotel_id], [
            'parking_available' => $request->parking_avaliable,
            'parking_type' => $request->parking_type,
            'parking_site' => $request->parking_site,
            'breakfast' => $request->brackfast_select,
            'breakfast_type' => $request->food_type_val,
            'facilities_id' => $facilities,
            'language' => $language,
        ]);

        $hotel = Hotel::select('UUID')->latest('created_at')->first();

        return response()->json(['redirect_url' => route('amenities', ['id' => $hotel_id])]);
    }

    /**
     * @param mixed $id
     *
     * @return  \Illuminate\View\View
     */
    public function amenities($id)
    {
        $hotelDetail = Hotel::whereUuid($id)->first();
        $amenities_category = AmenitiesCategory::with('amenities')->active()->get();
        return view('usersite::amenities', compact('amenities_category', 'hotelDetail'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function amenities_add_update(Request $request)
    {
        $hotel_id = $request->hotelId;

        $Hotel = Hotel::updateOrCreate(['UUID' => $hotel_id], [
            'extra_bed' => $request->extra_bed,
            'number_extra_bed' => $request->extra_no_of_bed,
            'amenity_id' => $request['amenities'],
        ]);

        return response()->json(['redirect_url' => route('photo', ['id' => $Hotel->UUID])]);
    }

    /**
     * @param int $id
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function editRoom($id, Request $request)
    {
        $room = Room::whereUuid($request->roomId)->select('id', 'UUID')->first();
        $url = url("/user/layout-pricing-form/" . $id . "?roomId=" . $room->id);
        return response()->json(['redirect_url' => $url]);
    }

    /**
     * @param mixed $id
     *
     * @return \Illuminate\View\View
     */
    public function viewPolicy($id)
    {
        $hotelDetail = Hotel::whereUuid($id)->first();
        return view('usersite::policies', compact('hotelDetail'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function add_policy(Request $request)
    {
        $hotel_id = $request->hotelId;
        $hotelDetail = Hotel::with('photos')->where('UUID', $hotel_id)->first();
        $hotelRoomDetail = Room::where('hotel_id', $hotelDetail->id)->first();

        if(empty($hotelDetail->property_name) || empty($hotelDetail->description) || empty($hotelDetail->street_addess) || empty($hotelDetail->pos_code)){
            return response()->json(['basic_info_error' => 'Please Fill Basic Form'], 401);
        }

        if(empty($hotelRoomDetail->room_type_id) || empty($hotelRoomDetail->price_room)) {
            return response()->json(['layout_pricing_error' => 'Please Fill Layout && Pricing Form'], 401);
        }
        
        if(empty($hotelDetail->language)) {
            return response()->json(['facilitis_servicies_error' => 'Please Fill Facilites && Services Form'], 401);
        }

        if(empty($hotelDetail->photos[0]->photos)) {
            return response()->json(['property_image_error' => 'At Least Upload One Image For Property'], 401);
        }
        
        
        $Hotel = Hotel::updateOrCreate(['UUID' => $hotel_id], [
            'cancel_booking' => $request->cancel_select,
            'pay_type' => $request->guest_pay,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'complete' => $request->complete,
        ]);
        
        $id = '';
        $notification = Notification::updateOrCreate(['id' => $id], [
            'hotel_id' => $Hotel->id,
        ]);
        
        if(empty($request->check_in) || empty($request->check_out)){
            return response()->json(['policies_error' => 'Please Fill Policies Form Detail'], 401);
        }

        return response()->json(['redirect_url' => route('user.view')]);
    }

    /**
     * @param mixed $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProperty($id)
    {
        $hotel = Hotel::where('UUID', $id)->first();
        $rooms = Room::where('hotel_id', $hotel->id)->get();
        $hotelPhotos = HotelPhoto::where('hotel_id', $hotel->id)->get();
        foreach ($rooms as $room) {
            if ($room->id != null) {
                $hotelBedDelete = HotelBed::where('room_id', $room->id)->delete();
            }
        }
        $roomDelete = Room::where('hotel_id', $hotel->id)->delete();

        foreach ($hotelPhotos as $hotelphoto) {
            $photos = $hotelphoto['photos'];
            $image_path = public_path('storage/' . $photos);
            $real_path = public_path('storage/' . $hotelphoto['real_photo']);
            if (File::exists($image_path)) {
                unlink($image_path);
                unlink($real_path);
            }
        }

        $hotelContact = HotelContact::where('hotel_id', $hotel->id)->delete();
        $hotelPhotosDelete = HotelPhoto::where('hotel_id', $hotel->id)->delete();
        $hotelDelete = Hotel::where('UUID', $id)->delete();

        return response()->json(["danger" => "property deleted Successfully"], 200);
    }

    /**
     * @param int $hotelId
     * @param int $id
     *
     * @return  \Illuminate\Http\JsonResponse
     */
    public function deleteRoom($hotelId, $id)
    {
        $room = Room::where('UUID', $id)->select('id', 'UUID', 'hotel_id')->first();
        $roomCount = Room::where('hotel_id', $room->hotel_id)->count();
        $roomBed = HotelBed::where('room_id', $room->id)->delete();
        $room = Room::where('UUID', $id)->delete();

        return response()->json(["success" => "room deleted Successfully", 'roomCount' => $roomCount, 'redirect_url' => route('room-list', ['id' => $hotelId]), 'layout_url' => route('layout-form', ['id' => $hotelId])], 200);
    }

    /**
     * @param int $id
     *
     * @return  \Illuminate\View\View
     */
    public function viewPhotos($id)
    {
        $photoCategories = Photocategory::get();
        $hotelDetail = Hotel::whereUuid($id)->first();
        $hotelPhotos = HotelPhoto::whereHotel_id($hotelDetail->id)->get();
        return view('usersite::photo', compact('hotelDetail', 'photoCategories', 'hotelPhotos'));
    }

    /**
     * @param int $id
     * @param Request $request
     *
     * @return  \Illuminate\Http\JsonResponse
     */
    public function save_photos($id, Request $request)
    {
        $image_64 = $request->url;
        // $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $image_parts = explode(';base64,', $image_64);
        $image_type_aux = explode("image/", $image_parts[0]);
        $extension = $image_type_aux[1];

        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = 'Img_' . Str::random(10) . '.' . $extension;
        $img = '';
        if (is_string($image)) {
            $img = base64_decode($image);
        }
        Storage::disk('public')->put('hotel' . '/' . $imageName, $img);

        // compress file
        $path = storage_path('/app/public/hotels');
        $storageDestinationPath = $path;

        $hotel = Hotel::whereUuid($id)->select('id')->first();
        $hotel_id = $hotel->id;

        if (!\File::exists($storageDestinationPath)) {
            \File::makeDirectory($storageDestinationPath, 0755, true);
        }

        $photo = \Image::make($img);

        $photo->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($storageDestinationPath . "/" . $imageName);

        $hotelPhotoId = '';
        $hotelphoto = HotelPhoto::updateOrCreate(['UUID' => $hotelPhotoId], [
            'main_photo' => $request->main,
            'photos' => 'hotels/' . $imageName,
            'hotel_id' => $hotel_id,
            'real_photo' => 'hotel/' . $imageName,
            'category_id' => $request->photoCategory,
        ]);

        return response()->json(['redirect_url' => route('policy', ['id' => $id])]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePhotos(Request $request)
    {
        $editImages = $request->EditImages;
        $main_photos = $request->main_photos;
        //    echo $editImages;
        //    dd($main_photos);
        if ($editImages != null) {

            foreach ($editImages as $key => $editImage) {

                foreach ($main_photos as $key => $main_photo) {
                    // dd($main_photo['id']);
                    $hotelPhotoId = $editImage['id'];
                    $hotelPhotoPType = $editImage['propertyType'];
                    $main_photo_id = $main_photo['id'];

                    if ($hotelPhotoId == $main_photo_id) {

                        $editImageData = HotelPhoto::whereUuid($hotelPhotoId)->firstOrFail();

                        $editImageData->update([
                            'main_photo' => $main_photo['main'],
                            'category_id' => $hotelPhotoPType,
                        ]);

                    }
                }
            }
        }

        $hotelPhotos = json_decode($request->deleteImages);

        if ($hotelPhotos != null) {
            foreach ($hotelPhotos as $hotelphoto) {
                $hotelPhotoData = HotelPhoto::whereUuid($hotelphoto);
                $hotelPhotoPath = $hotelPhotoData->first();

                $photos = $hotelPhotoPath['photos'];
                $image_path = public_path('storage/' . $photos);
                $real_path = public_path('storage/' . $hotelPhotoPath['real_photo']);
                if (File::exists($image_path)) {
                    unlink($image_path);
                    unlink($real_path);
                }

                $hotelPhotoData->delete();
            }
        }
        $id = request()->hotelId;
        return response()->json(['redirect_url' => route('policy', ['id' => $id])]);
    }

    // public function add_room(Request $request) {
    //     $hotel_id = Session::get('hotel')->id;
    //     $hotel_data = $request->hotelId;
    //     $Hotel = Room::updateOrCreate([ 'id' => $hotel_id ],[
    //         'smoking_policy'   => $request->smoking_area,
    //         'custom_name_room' => $request->custom_name,
    //         'number_of_room'   => $request->number_of_room,
    //         'guest_stay_room'  => $request->number_of_guest,
    //         'room_size'        => $request->room_size,
    //         'room_cal_type'    => $request->room_size_feet,
    //         'bathroom_private' => $request->bathroom_private,
    //         'bathroom_item'    => $request->bathroom_item,
    //         'price_room'       => $request->bed_price,
    //         'room_list_id'     => $request->room_name_select,
    //         'room_type_id'     => $request->room_type,
    //         'discount'         => $request->discountValue,
    //         'discount_type'    => $request->discountType,
    //         'min_person_discount' => $request->personDis,
    //         'hotel_id'         => $hotel_id
    //     ]);

    //     $room_id = Room::latest('created_at')->take(1)->first();

    //     $id = 1;
    //     $beds = json_decode($request->get('BedDetail'));

    //     foreach($beds as $bed) {
    //         $Hotel   =   HotelBed::updateOrCreate([ 'id' => $id ],[
    //             'no_of_bed' => $bed->bedNo,
    //             'bed_id'    => $bed->bed,
    //             'room_id'   => $room_id->id,
    //         ]);
    //     }
    //     return response()->json(['redirect_url' => route('room-list', ['id' => $hotel_data])]);
    // }

    // public function add_facilities(Request $request) {

    //     $lang = explode(",", $request['language']);
    //     $language = join(",", array_unique($lang));
    //     $facilities = $request['facilities'];
    //     $hotel_id = Session::get('hotel')->id;

    //     $Hotel   =   Hotel::updateOrCreate([ 'id' => $hotel_id ], [
    //         'parking_available'  => $request->parking_avaliable,
    //         'parking_type'       => $request->parking_type,
    //         'parking_site'       => $request->parking_site,
    //         'breakfast'          => $request->brackfast_select,
    //         'breakfast_type'     => $request->food_type_val,
    //         'facilities_id'      => $facilities,
    //         'language'           => $language
    //     ]);

    //     return response()->json(['redirect_url' => route('amenities')]);
    // }

    // public function add_amenities(Request $request) {

    //     $hotel_id = Session::get('hotel')->id;

    //     $Hotel   =   Hotel::updateOrCreate([ 'id' => $hotel_id ], [
    //         'extra_bed'        => $request->extra_bed,
    //         'number_extra_bed' => $request->extra_no_of_bed,
    //         'amenity_id'       => $request['amenities'],
    //     ]);
    //     $hotel = Hotel::select('id','UUID')->first();
    //     return response()->json(['redirect_url' => route('photo', ['id' => $hotel->UUID])]);
    // }
}
