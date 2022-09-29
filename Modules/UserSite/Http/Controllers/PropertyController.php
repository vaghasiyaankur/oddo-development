<?php

namespace Modules\UserSite\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;
use App\Models\PropertyType;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\HotelContact;
use App\Models\RoomType;
use App\Models\RoomList;
use App\Models\Facilities;
use App\Models\Amenities;
use App\Models\AmenitiesCategory;
use App\Models\BedType;
use App\Models\Room;
use App\Models\HotelBed;
use App\Models\FoodType;
use App\Models\BathroomItem;
use Modules\UserSite\Entities\HotelPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Notification;
use App\Models\Photocategory;

class PropertyController extends Controller
{

    public function category() {
        $properties = PropertyType::active()->get();
        return view('usersite::property-category', compact('properties'));
    }

    public function basicInfo(Request $request, $id) {

        $hotel_id = $id;
        $countries = Country::with('cities')->active()->get();
        $hotelDetail = Hotel::with('propertytype')->whereUuid($id)->first();

        $userId = auth()->user()->id;
        $hotelUserId = Hotel::where('UUID',$id)->select('user_id', 'id')->first();
        if($userId == $hotelUserId->user_id){
            $countries = Country::with('cities')->active()->get();
            $hotelDetail = Hotel::where('UUID',$id)->with('propertytype')->first();
            $hotelContacts = HotelContact::where('hotel_id', $hotelUserId->id)->get();
            return view('usersite::BasicInfo', compact('countries', 'hotelDetail', 'hotelContacts'));
        }else{
            return redirect()->back();
        }
        return view('usersite::BasicInfo', compact('countries', 'hotelDetail'));
    }

    public function cities(Request $request){
        $country = $request->country;
        $cities = Country::where('id',$country)->with('cities')->active()->get();
        return response()->json(['cities' => $cities]);
    }

    public function add_property(Request $request) {
        $userId = auth()->user()->id;
        $hotel = new Hotel();
        $hotel->property_id = $request->property;
        $hotel->user_id = $userId;
        $hotel->save();

        $hotel_id = Hotel::latest('created_at')->take(1)->first();
        Session::put('hotel', $hotel_id);
        return response()->json(['redirect_url' => route('basic-info', ['id' => $hotel_id->UUID])]);
    }

    public function property_submitUpdate(Request $request)
    {
        if ($request->hotelId) {
            $hotelId = $request->hotelId;
        }else{
            $hotelId = Session::get('hotel')->id;
        }
        $count = $request->count;

        $Hotel = Hotel::updateOrCreate([ 'UUID' => $hotelId ], [
            'property_name' => $request->property_name,
            'description'   => $request->description,
            'star_rating'   => $request->star_rating,
            'street_addess' => $request->address,
            'address_line'  => $request->address_line,
            'country_id'    => $request->country,
            'city_id'       => $request->city,
            'pos_code'      => $request->zipcode
        ]);

        $contacts = json_decode($request->get('contactDetail'));

        $contact_id = $request->contact_id;
        if($contacts){
            foreach($contacts as $contact) {
                if($contact->id != 0) {
                    $hotelContact   =   HotelContact::updateOrCreate([ 'UUID' => $contact->id ], [
                        'name' => $contact->name,
                        'number'   => $contact->phone,
                        'number_optinal' => $contact->phoneOptional,
                        'hotel_id' => $Hotel->id
                    ]);
                }else{
                    $contact_id = '';
                    $hotelContact   =   HotelContact::updateOrCreate([ 'UUID' => $contact_id ], [
                        'name' => $contact->name,
                        'number'   => $contact->phone,
                        'number_optinal' => $contact->phoneOptional,
                        'hotel_id' => $Hotel->id
                    ]);
                }
            }
        }
        if ($request->hotelId) {
            $rooms = Room::where('hotel_id', $Hotel->id)->get();

            if($rooms->count() < 1){
                return response()->json(['redirect_url' => route('layout-form', ['id' => $hotelId])]);
            }elseif($rooms->count() == 1){
                $url =  url("/user/layout-pricing-form/".$hotelId."?roomId=".$rooms[0]->UUID);
                return response()->json(['redirect_url' => $url]);
            } else{
                return response()->json(['redirect_url' => route('room-list', ['id' => $hotelId])]);
            }
        }
    }

    public function layout_pricing($id, Request $request) {
        $room_types = RoomType::active()->get();
        $beds       = BedType::active()->get();
        $bathrooms  = BathroomItem::active()->get();
        $hotel = Hotel::with('propertytype')->whereUuid($id)->first();
        $rooms = Room::with('roomlist')->where('hotel_id',$hotel->id)->get('id');
        $roomDetail = Room::where('UUID', $request->roomId)->first();

        if ($roomDetail) {
            $hotelBeds = HotelBed::where('room_id', $roomDetail->id)->get();
            return view('usersite::layout-pricing', compact('room_types', 'beds', 'bathrooms', 'hotel', 'rooms', 'roomDetail', 'hotelBeds'));
        }

        return view('usersite::layout-pricing', compact('room_types', 'beds', 'bathrooms', 'hotel', 'rooms', 'roomDetail'));
    }

    public function room_lists($id) {
        $hotel_id = $id;
        $hotels = Hotel::whereUuid($id)->first();
        $rooms = Room::with('roomlist')->where('hotel_id',$hotels->id)->get();

        return view('usersite::room-list', compact('rooms','hotels'));
    }

    public function layouts_add_update(Request $request) {
        $hotel_data = $request->hotelId;
        $hotel_id = Hotel::whereUuid($hotel_data)->first();
        $roomId = $request->roomId;

        $Room = Room::updateOrCreate(['UUID' => $roomId],[
            'smoking_policy'   => $request->smoking_area,
            'custom_name_room' => $request->custom_name,
            'number_of_room'   => $request->number_of_room,
            'guest_stay_room'  => $request->number_of_guest,
            'room_size'        => $request->room_size,
            'room_cal_type'    => $request->room_size_feet,
            'bathroom_private' => $request->bathroom_private,
            'bathroom_item'    => $request->bathroom_item,
            'price_room'       => $request->bed_price,
            'room_list_id'     => $request->room_name_select,
            'room_type_id'     => $request->room_type,
            'discount'         => $request->discountValue,
            'discount_type'    => $request->discountType,
            'min_person_discount' => $request->personDis,
            'hotel_id'         => $hotel_id->id
        ]);

        $room_id = Room::latest('created_at')->take(1)->first();

        $beds = json_decode($request->get('BedDetail'));

        foreach($beds as $bed) {
            $HotelBed   =   HotelBed::updateOrCreate([ 'id' => $bed->bedId ],[
                'no_of_bed' => $bed->bedNo,
                'bed_id'    => $bed->bed,
                'room_id'   => $room_id->id,
            ]);
        }
        return response()->json(['redirect_url' => route('room-list', ['id' => $hotel_data])]);
    }

    public function room_list(Request $request) {
        $room_type_id = $request->room_type_id;
        $roomlist = RoomType::where('id',$room_type_id)->with('room_lists')->active()->get();
        return response()->json([ 'roomlist' => $roomlist ]);
    }


    public function facilities($id) {
        $facilities = Facilities::active()->get();
        $food_types = FoodType::active()->get();
        $hotelDetail = Hotel::whereUuid($id)->first();
        return view('usersite::facilities', compact('facilities', 'food_types', 'hotelDetail'));
    }

    public function facilities_add_update(Request $request)
    {
        $lang = explode(",", $request['language']);
        $language = join(",", array_unique($lang));
        $facilities = $request['facilities'];
        $hotel_id = $request->hotelId;

        $Hotel   =   Hotel::updateOrCreate([ 'UUID' => $hotel_id ], [
            'parking_available'  => $request->parking_avaliable,
            'parking_type'       => $request->parking_type,
            'parking_site'       => $request->parking_site,
            'breakfast'          => $request->brackfast_select,
            'breakfast_type'     => $request->food_type_val,
            'facilities_id'      => $facilities,
            'language'           => $language
        ]);

        $hotel = Hotel::select('UUID')->latest('created_at')->first();

        return response()->json(['redirect_url' => route('amenities', ['id' => $hotel_id])]);
    }


    public function amenities($id) {
        $hotelDetail = Hotel::whereUuid($id)->first();
        $amenities_category = AmenitiesCategory::with('amenities')->active()->get();
        return view('usersite::amenities',compact('amenities_category','hotelDetail'));
    }

    public function amenities_add_update(Request $request)
    {
        $hotel_id = $request->hotelId;

        $Hotel   =   Hotel::updateOrCreate([ 'UUID' => $hotel_id ], [
            'extra_bed'        => $request->extra_bed,
            'number_extra_bed' => $request->extra_no_of_bed,
            'amenity_id'       => $request['amenities'],
        ]);

        return response()->json(['redirect_url' => route('photo', ['id' => $Hotel->UUID])]);
    }


    public function editRoom($id, Request $request)
    {
        $roomId = Room::whereUuid($request->roomId)->pluck('UUID')->first();
        $url =  url("/user/layout-pricing-form/".$id."?roomId=".$roomId);
        return response()->json(['redirect_url' => $url]);
    }

    public function viewPolicy($id)
    {
        $hotelDetail = Hotel::whereUuid($id)->first();
        return view('usersite::policies', compact('hotelDetail'));
    }

    public function add_policy(Request $request) {
        $hotel_id = $request->hotelId; 
        $Hotel = Hotel::updateOrCreate([ 'UUID' => $hotel_id ],[
            'cancel_booking' => $request->cancel_select,
            'pay_type'       => $request->guest_pay,
            'check_in'       => $request->check_in,
            'check_out'      => $request->check_out,
            'complete'       => $request->complete
        ]);

        $id = '';
        $notification = Notification::updateOrCreate(['id' => $id], [
            'hotel_id' => $Hotel->id,
        ]);

        return response()->json(['redirect_url' => route('home.index')]);
    }

    public function deleteProperty($id)
    {
        $hotel = Hotel::where('UUID',$id)->first();
        $rooms = Room::where('hotel_id',$hotel->id)->get();
        $hotelPhotos = HotelPhoto::where('hotel_id', $hotel->id)->get();
        if($rooms){
            foreach($rooms as $room) {
                if($room->id != null) {
                    $hotelBedDelete = HotelBed::where('room_id', $room->id)->delete();
                }
            }
        }
        $roomDelete = Room::where('hotel_id',$hotel->id)->delete();

        foreach($hotelPhotos as $hotelphoto) {
            $image_path = public_path('storage/'.$hotelphoto->photos);
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }

        $hotelContact = HotelContact::where('hotel_id', $hotel->id)->delete();
        $hotelPhotosDelete = HotelPhoto::where('hotel_id', $hotel->id)->delete();
        $hotelDelete = Hotel::where('UUID',$id)->delete();

        return response()->json(["danger" => "property deleted Successfully"], 200);
    }

    public function deleteRoom($hotelId, $id)
    {
        $room = Room::where('UUID', $id)->select('id', 'UUID', 'hotel_id')->first();
        $roomCount = Room::where('hotel_id', $room->hotel_id)->count();
        $roomBed = HotelBed::where('room_id', $room->id)->delete();
        $room = Room::where('UUID', $id)->delete();

        return response()->json(["success" => "room deleted Successfully", 'roomCount' => $roomCount, 'redirect_url' => route('room-list', ['id' => $hotelId]), 'layout_url' => route('layout-form', ['id' => $hotelId])], 200);
    }

    public function viewPhotos($id)
    {
        $photoCategories = Photocategory::get();
        $hotelDetail = Hotel::whereUuid($id)->first();
        $hotelPhotos = HotelPhoto::whereHotel_id($hotelDetail->id)->get();
        return view('usersite::photo', compact('hotelDetail', 'photoCategories', 'hotelPhotos'));
    }

    public function save_photos($id,Request $request) {
        // dd($request->deleteImage);
        $image_64 = $request->url;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',')+1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = 'Img_'.Str::random(10).'.'.$extension;
        $img =base64_decode($image);
        Storage::disk('public')->put('hotel'.'/'.$imageName, base64_decode($image));

        // compress file 
        $path = storage_path('/app/public/hotels');
        $storageDestinationPath=$path;
        
        $hotelId = Hotel::whereUuid($id)->pluck('id')->first();
        $hotel_id = $hotelId;

        $x=5;
        if (!\File::exists($storageDestinationPath)) {
            \File::makeDirectory($storageDestinationPath, 0755, true);
        }
        
         \Image::make(base64_decode($image))
         ->save($storageDestinationPath."/".$imageName,$x);


        $hotelPhotoId = '';
        $hotelphoto = HotelPhoto::updateOrCreate([ 'UUID' => $hotelPhotoId ],[
            'main_photo' => $request->main,
            'photos' => 'hotels/'.$imageName,
            'hotel_id' => $hotel_id,
            'real_photo' => 'hotel/'.$imageName,
            'category_id' => $request->photoCategory,
        ]);

        return response()->json(['redirect_url' => route('policy', ['id' => $id])]);
    }

    public function updatePhotos(Request $request)
    {
       $editImages = $request->EditImages;
        if($editImages != null){
            foreach($editImages as $key => $editImage) {
                $hotelPhotoId = $editImage['id'];
                $hotelPhotoPType = $editImage['propertyType'];

                $editImageData = HotelPhoto::whereUuid($hotelPhotoId)->firstOrFail();
                $editImageData->update([
                'category_id' => $hotelPhotoPType
                ]);
            }
        }

        $hotelPhotos = json_decode($request->deleteImages);

        if($hotelPhotos != null){
            foreach($hotelPhotos as $hotelphoto) {
                $hotelPhoto = HotelPhoto::whereUuid($hotelphoto);
                $hotelPhotoPath = $hotelPhoto->first();
                $image_path = public_path('storage/'.$hotelPhotoPath->photos);
                $real_path = public_path('storage/'.$hotelPhotoPath->real_photo);
                if (File::exists($image_path)) {
                    unlink($image_path);
                    unlink($real_path);

                }
                $hotelPhoto->delete();
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
