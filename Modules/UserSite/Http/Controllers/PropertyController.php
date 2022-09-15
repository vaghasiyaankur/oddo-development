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

class PropertyController extends Controller
{

    public function category() {
        $propertys = PropertyType::active()->get();
        return view('usersite::property-category', compact('propertys'));
    }

    public function basicInfo(Request $request, $id) {
        $hotel_id = Session::get('hotel')->id;
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

    // public function property_submit(Request $request) {
    //     $hotel_id = Session::get('hotel')->id;
    //     $count = $request->count;

    //     $Hotel  =  Hotel::updateOrCreate([ 'id' => $hotel_id ], [
    //         'property_name' => $request->property_name,
    //         'description'   => $request->description,
    //         'star_rating'   => $request->star_rating,
    //         'street_addess' => $request->address,
    //         'address_line'  => $request->address_line,
    //         'country_id'    => $request->country,
    //         'city_id'       => $request->city,
    //         'pos_code'      => $request->zipcode
    //     ]);

    //     $contents = json_decode($request->get('contactDetail'));

    //     $contact_id = $request->contact_id;
    //     foreach($contents as $contect){
    //         $HotelContact   =   HotelContact::updateOrCreate([ 'id' => $contact_id ], [
    //             'name' => $contect->name,
    //             'number'   => $contect->phone,
    //             'number_optinal' => $contect->phoneOptional,
    //             'hotel_id' => $hotel_id,
    //         ]);
    //     }
    //     return response()->json(['redirect_url' => route('layout-form')]);
    // }

    public function property_submitUpdate(Request $request)
    {
        if ($request->hotelId) {
            $hotelId = $request->hotelId;
        }else{
            $hotelId = Session::get('hotel')->id;
        }
        $count = $request->count;

        $Hotel   =  Hotel::updateOrCreate([ 'UUID' => $hotelId ], [
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
            $roomCount = Room::where('hotel_id', $Hotel->id)->count();

            if($roomCount == 1){
                return response()->json(['redirect_url' => route('edit.layoutPrice', ['id' => $hotelId])]);
            }else{
                return response()->json(['redirect_url' => route('edit.layout', ['id' => $hotelId])]);
            }
        }
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

    // public function layout_pricing($id) {
    //     $room_types = RoomType::active()->get();
    //     $beds       = BedType::active()->get();
    //     $bathrooms  = BathroomItem::active()->get();

    //     $hotel = Hotel::with('propertytype')->whereUuid($id)->latest('created_at')->first();

    //     // $hotel_id = $request->hotelId;
    //     $hotel_id = Session::get('hotel')->id;
    //     $rooms = Room::with('roomlist')->where('hotel_id',$hotel_id)->get('id');
    //     $roomDetail = Room::where('hotel_id', $hotel->id)->first();
    //     $hotelBeds = HotelBed::where('room_id', $roomDetail->id)->get();

    //     return view('usersite::layout-pricing', compact('room_types', 'beds', 'bathrooms', 'hotel', 'rooms', 'roomDetail', 'hotelBeds'));
    // }

    public function layout_pricing() {
        $room_types = RoomType::active()->get();
        $beds       = BedType::active()->get();
        $bathrooms  = BathroomItem::active()->get();

        $hotel = Hotel::with('propertytype')->latest('created_at')->first();
        $hotel_id = Session::get('hotel')->id;
        $rooms = Room::with('roomlist')->where('hotel_id',$hotel_id)->get('id');

        return view('usersite::layout-pricing', compact('room_types', 'beds', 'bathrooms', 'hotel', 'rooms'));
    }

    public function facilities($id) {
        // dd($id);
        $facilities = Facilities::active()->get();
        $food_types = FoodType::active()->get();
        $hotelDetail = Hotel::whereUuid($id)->first();
        return view('usersite::facilities', compact('facilities', 'food_types', 'hotelDetail'));
    }

    public function room_list(Request $request) {
        $room_type_id = $request->room_type_id;
        $roomlist = RoomType::where('id',$room_type_id)->with('room_lists')->active()->get();
        return response()->json([ 'roomlist' => $roomlist ]);
    }

    public function room_lists($id) {
        $hotel_id = Session::get('hotel')->id;
        $hotels = Hotel::whereUuid($id)->first();
        $rooms = Room::with('roomlist')->where('hotel_id',$hotel_id)->get();

        return view('usersite::room-list', compact('rooms','hotels'));
    }

    public function amenities() {
        $hotelDetail = Hotel::latest()->first();
        $amenities_category = AmenitiesCategory::with('amenities')->active()->get();
        return view('usersite::amenities',compact('amenities_category','hotelDetail'));
    }

    public function layouts_add_update(Request $request) {
        $hotel_id = Session::get('hotel')->id;
        $hotel_data = $request->hotelId;
        $Hotel = Room::updateOrCreate([ 'UUID' => $hotel_id ],[
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
            'hotel_id'         => $hotel_id
        ]);

        $room_id = Room::latest('created_at')->take(1)->first();

        $id = 1;
        $beds = json_decode($request->get('BedDetail'));

        foreach($beds as $bed) {
            $Hotel   =   HotelBed::updateOrCreate([ 'id' => $id ],[
                'no_of_bed' => $bed->bedNo,
                'bed_id'    => $bed->bed,
                'room_id'   => $room_id->id,
            ]);
        }
        return response()->json(['redirect_url' => route('room-list', ['id' => $hotel_data])]);
    }

    public function photos_add_update(Request $request){
        $hotelphoto = HotelPhoto::where('UUID')->first();
        $hotel = Hotel::select('id','UUID')->first();
        $hotel_id = Hotel::latest()->first();
        if($request->file){
        $image_64 = $request->url;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',')+1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = 'Img_'.Str::random(10).'.'.$extension;
        $img =base64_decode($image);
        Storage::disk('public')->put('hotels'.'/'.$imageName, base64_decode($image));

        $image_path = public_path('storage/'.$hotelphoto->main_photo);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $hotel_id = $request->hotelId;
        $hotelphoto->main_photo = $request->main;
        $hotelphoto->photos     = 'hotels/'.$imageName;
        $hotelphoto->hotel_id  = $hotel_id;
        $hotelphoto->update();
        }

        return response()->json(['redirect_url' => route('policy', ['id' => $hotel_id->UUID])]);
    }

    public function add_room(Request $request) {
        $hotel_id = Session::get('hotel')->id;
        $hotel_data = $request->hotelId;
        $Hotel = Room::updateOrCreate([ 'id' => $hotel_id ],[
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
            'hotel_id'         => $hotel_id
        ]);

        $room_id = Room::latest('created_at')->take(1)->first();

        $id = 1;
        $beds = json_decode($request->get('BedDetail'));

        foreach($beds as $bed) {
            $Hotel   =   HotelBed::updateOrCreate([ 'id' => $id ],[
                'no_of_bed' => $bed->bedNo,
                'bed_id'    => $bed->bed,
                'room_id'   => $room_id->id,
            ]);
        }
        return response()->json(['redirect_url' => route('room-list', ['id' => $hotel_data])]);
    }

    public function add_facilities(Request $request) {

        $lang = explode(",", $request['language']);
        $language = join(",", array_unique($lang));
        $facilities = $request['facilities'];
        $hotel_id = Session::get('hotel')->id;

        $Hotel   =   Hotel::updateOrCreate([ 'id' => $hotel_id ], [
            'parking_available'  => $request->parking_avaliable,
            'parking_type'       => $request->parking_type,
            'parking_site'       => $request->parking_site,
            'breakfast'          => $request->brackfast_select,
            'breakfast_type'     => $request->food_type_val,
            'facilities_id'      => $facilities,
            'language'           => $language
        ]);

        return response()->json(['redirect_url' => route('amenities')]);
    }

    public function add_amenities(Request $request) {

        $hotel_id = Session::get('hotel')->id;

        $Hotel   =   Hotel::updateOrCreate([ 'id' => $hotel_id ], [
            'extra_bed'        => $request->extra_bed,
            'number_extra_bed' => $request->extra_no_of_bed,
            'amenity_id'       => $request['amenities'],
        ]);
        $hotel = Hotel::select('id','UUID')->first();
        return response()->json(['redirect_url' => route('photo', ['id' => $hotel->UUID])]);
    }

    // public function save_photos(Request $request) {
    //     $image_64 = $request->url;
    //     $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
    //     $replace = substr($image_64, 0, strpos($image_64, ',')+1);
    //     $image = str_replace($replace, '', $image_64);
    //     $image = str_replace(' ', '+', $image);
    //     $imageName = 'Img_'.Str::random(10).'.'.$extension;
    //     $img =base64_decode($image);
    //     Storage::disk('public')->put('hotels'.'/'.$imageName, base64_decode($image));

    //     $hotel_id = $request->hotelId;
    //     $hotelphoto = new HotelPhoto();
    //     $hotelphoto->main_photo = $request->main;
    //     $hotelphoto->photos     = 'hotels/'.$imageName;
    //     $hotelphoto->hotel_id  = $hotel_id;
    //     $hotelphoto->save();
    //     // $Hotel   =   HotelPhoto::updateOrCreate([ 'id' => $hotel_id ], [
    //     //     'main_photo'  => $request->main,
    //     //     'photos' => 'hotels/'.$imageName,
    //     //     'hotel_id' => $hotel_id,
    //     // ]);
    //     $hotel = Hotel::select('id','UUID')->first();
    //     dd($hotel);
    //     return response()->json(['redirect_url' => route('policy', ['id' => $hotel_id])]);
    // }

    public function add_policy(Request $request) {
        $hotel_id = Session::get('hotel')->id;

        $Hotel = Hotel::updateOrCreate([ 'id' => $hotel_id ],[
            'cancel_booking' => $request->cancel_select,
            'pay_type'       => $request->guest_pay,
            'check_in'       => $request->check_in,
            'check_out'      => $request->check_out,
            'complete'       => $request->complete
        ]);

        $id = '';
        // $notification = Notification::updateOrCreate(['id' => $id], [
        //     'hotel_id' => $hotel_id,
        // ]);
        // dd($notification);
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

        // if($room){
        //     if($room->id != null) {
        //         $roomBed = HotelBed::where('room_id', $room->id)->select('room_id')->first();
        //         if($room->id == $roomBed->room_id) {
        //             $hotelBedDelete = HotelBed::where('room_id', $room->id)->delete();
        //         }
        //     }
        //     $roomDelete = Room::where('hotel_id',$hotel->id)->delete();
        // }

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

    public function deleteRoom($id)
    {
        $room = Room::where('UUID', $id)->select('id', 'UUID', 'hotel_id')->first();
        $roomCount = Room::where('hotel_id', $room->hotel_id)->count();
        $roomBed = HotelBed::where('room_id', $room->id)->delete();
        $room = Room::where('UUID', $id)->delete();

        return response()->json(["success" => "room deleted Successfully", 'roomCount' => $roomCount], 200);
    }

    public function editProperty($id)
    {
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
    }


    // public function updateProperty(Request $request)
    // {
    //     $hotel_id = $request->hotelId;

    //     $Hotel = Hotel::updateOrCreate([ 'UUID' => $hotel_id ], [
    //         'property_name' => $request->property_name,
    //         'description'   => $request->description,
    //         'star_rating'   => $request->star_rating,
    //         'street_addess' => $request->address,
    //         'address_line'  => $request->address_line,
    //         'country_id'    => $request->country,
    //         'city_id'       => $request->city,
    //         'pos_code'      => $request->zipcode
    //     ]);

    //     $hotelId = Hotel::where('UUID', $hotel_id)->select('id')->first();
    //     $contacts = json_decode($request->get('contactDetail'));

    //     if($contacts){
    //         foreach($contacts as $contact) {
    //             if($contact->id != 0) {
    //                 $hotelContact   =   HotelContact::updateOrCreate([ 'UUID' => $contact->id ], [
    //                     'name' => $contact->name,
    //                     'number'   => $contact->phone,
    //                     'number_optinal' => $contact->phoneOptional,
    //                     'hotel_id' => $hotelId->id
    //                 ]);
    //             }else{
    //                 $contact_id = '';
    //                 $hotelContact   =   HotelContact::updateOrCreate([ 'UUID' => $contact_id ], [
    //                     'name' => $contact->name,
    //                     'number'   => $contact->phone,
    //                     'number_optinal' => $contact->phoneOptional,
    //                     'hotel_id' => $hotelId->id
    //                 ]);
    //             }
    //         }
    //     }

    //     $roomCount = Room::where('hotel_id', $hotelId->id)->count();

    //     if($roomCount == 1){
    //         return response()->json(['redirect_url' => route('edit.layoutPrice', ['id' => $hotel_id])]);
    //     }else{
    //         return response()->json(['redirect_url' => route('edit.layout', ['id' => $hotel_id])]);
    //     }
    // }

    public function editLayout($id)
    {
        $hotel_id = Session::get('hotel')->id;
        $hotel = Hotel::where('UUID', $id)->select('id','UUID')->first();
        $rooms = Room::with('roomlist')->where('hotel_id', $hotel_id)->get();
        return view('usersite::room-list', compact('rooms', 'hotel'));



        $hotel_id = Hotel::latest('created_at')->take(1)->first();
        Session::put('hotel', $hotel_id);
        return response()->json(['redirect_url' => route('basic-info', ['id' => $hotel_id->UUID])]);
    }

    public function editLayoutPrice($id)
    {
        $room_types = RoomType::active()->get();
        $beds       = BedType::active()->get();
        $bathrooms  = BathroomItem::active()->get();

        $hotel = Hotel::where('UUID', $id)->select('id', 'UUID')->first();
        $hotel_id = $hotel->id;
        $rooms = Room::with('roomlist')->where('hotel_id',$hotel_id)->get('id');
        $roomDetail = Room::where('hotel_id', $hotel->id)->first();
        $hotelBeds = HotelBed::where('room_id', $roomDetail->id)->get();
        // dd($hotelBeds[0]->bed_id);
        return view('usersite::layout-pricing', compact('room_types', 'beds', 'bathrooms', 'hotel', 'rooms', 'roomDetail', 'hotelBeds'));
    }

    public function updateRoom(Request $request)
    {
        $roomId = $request->roomId;
        $room = Room::updateOrCreate([ 'UUID' => $roomId ],[
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
            'min_person_discount' => $request->personDis
        ]);

        // $room_id = Room::where()->first();
        $roomData = Room::where('UUID', $roomId)->select('id')->first();
        if($request->BedDetail){
            $beds = json_decode($request->get('BedDetail'));
            foreach($beds as $bed) {
                if($bed->id != 0) {
                    $HotelBed = HotelBed::updateOrCreate([ 'room_id' => $roomData->id ],[
                        'no_of_bed' => $bed->bedNo,
                        'bed_id'    => $bed->bed,
                        'room_id' => $roomData->id
                    ]);
                }else{
                    $id = '';
                    $HotelBed = HotelBed::updateOrCreate([ 'id' => $id ],[
                        'no_of_bed' => $bed->bedNo,
                        'bed_id'    => $bed->bed,
                        'room_id'   => $roomData->id,
                    ]);
                }
            }
        }

        $hotel = $request->hotelId;

        return response()->json(['redirect_url' => route('edit.facilities', ['id' => $hotel])]);
    }

    public function editFacilities($id)
    {

        $facilities = Facilities::active()->get();
        $food_types = FoodType::active()->get();

        $hotelDetail = Hotel::where('UUID', $id)->first();
        return view('usersite::facilities', compact('facilities', 'food_types', 'hotelDetail'));
    }

    // public function updateFacilities(Request $request)
    // {
    //     $lang = explode(",", $request['language']);
    //     $language = join(",", array_unique($lang));
    //     $facilities = $request['facilities'];

    //     $hotelId = $request->hotelId;

    //     $Hotel = Hotel::updateOrCreate([ 'UUID' => $hotelId ], [
    //         'parking_available' => $request->parking_avaliable,
    //         'parking_type' => $request->parking_type,
    //         'parking_site' => $request->parking_site,
    //         'breakfast' => $request->brackfast_select,
    //         'breakfast_type' => $request->food_type_val,
    //         'facilities_id' => $facilities,
    //         'language' => $language
    //     ]);

    //     return response()->json(['redirect_url' => route('edit.amenities', ['id' => $hotelId])]);
    // }

    public function editAmenities($id) {

        $amenities_category = AmenitiesCategory::with('amenities')->active()->get();
        $hotelDetail = Hotel::where('UUID', $id)->first();

        return view('usersite::amenities',compact('amenities_category', 'hotelDetail'));
    }

    public function updateAmenities(Request $request) {
        $hotelId = $request->hotelId;

        $Hotel   =   Hotel::updateOrCreate([ 'UUID' => $hotelId ], [
            'extra_bed'        => $request->extra_bed,
            'number_extra_bed' => $request->extra_no_of_bed,
            'amenity_id'       => $request['amenities'],
        ]);

        return response()->json(['redirect_url' => route('edit.photo', ['id' => $hotelId])]);
    }

    public function editPhoto($id) {
        $hotelDetail = Hotel::where('UUID', $id)->first();
        $hotelPhotos = HotelPhoto::where('hotel_id', $hotelDetail->id)->get();

        return view('usersite::photo',compact('hotelPhotos', 'hotelDetail'));
    }

    public function updatePhotos(Request $request) {
        $hotelphoto = HotelPhoto::where('UUID')->first();
        if($request->file){
        $image_64 = $request->url;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',')+1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = 'Img_'.Str::random(10).'.'.$extension;
        $img =base64_decode($image);
        Storage::disk('public')->put('hotels'.'/'.$imageName, base64_decode($image));

        $image_path = public_path('storage/'.$hotelphoto->main_photo);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $hotelphoto->main_photo = $request->main;
        $hotelphoto->photos     = 'hotels/'.$imageName;
        $hotelphoto->hotel_id  = $hotel_id;
        $hotelphoto->update();
        }
    }
}
