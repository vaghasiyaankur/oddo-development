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

class PropertyController extends Controller
{

    public function category() {
        $propertys = PropertyType::active()->get();
        return view('usersite::property-category', compact('propertys'));
    }

    public function basicInfo() {
        $countries = Country::with('cities')->active()->get();
        $hotel = Hotel::with('propertytype')->latest()->first();
        return view('usersite::BasicInfo', compact('countries', 'hotel'));
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

        return response()->json(['redirect_url' => route('basic-info')]);
    }

    public function property_submit(Request $request) {
        $hotel_id = Session::get('hotel')->id;
        $count    = $request->count;
 
        $Hotel   =  Hotel::updateOrCreate([ 'id' => $hotel_id ], [
            'property_name' => $request->property_name,
            'description'   => $request->description,
            'star_rating'   => $request->star_rating,
            'street_addess' => $request->address,
            'address_line'  => $request->address_line,
            'country_id'    => $request->country,
            'city_id'       => $request->city,
            'pos_code'      => $request->zipcode
        ]);  

        $contents = json_decode($request->get('contactDetail'));
        $contact_id = $request->contact_id;
        foreach($contents as $contect){
            $Hotel   =   HotelContact::updateOrCreate([ 'id' => $contact_id ], [
                'name' => $contect->name,
                'number'   => $contect->phone,
                'number_optinal' => $contect->phoneOptional,
                'hotel_id' => $hotel_id,
            ]);  
        }
        return response()->json(['redirect_url' => route('layout-form')]);
    }

    public function layout_pricing() {
        $room_types = RoomType::active()->get();
        $beds       = BedType::active()->get();
        $bathrooms  = BathroomItem::active()->get();

        $hotel = Hotel::with('propertytype')->latest('created_at')->first();
        $hotel_id = Session::get('hotel')->id;
        $rooms = Room::with('roomlist')->where('hotel_id',$hotel_id)->get('id');

        return view('usersite::layout-pricing', compact('room_types', 'beds', 'bathrooms', 'hotel', 'rooms'));
    }

    public function facilities() {
        $facilities = Facilities::active()->get();
        $food_types = FoodType::active()->get();
        return view('usersite::facilities', compact('facilities', 'food_types'));
    }
    
    public function room_list(Request $request) {
        $room_type_id = $request->room_type_id;
        $roomlist = RoomType::where('id',$room_type_id)->with('room_lists')->active()->get();
        return response()->json([ 'roomlist' => $roomlist ]);
    }

    public function room_lists() {
        $hotel_id = Session::get('hotel')->id;
        $rooms = Room::with('roomlist')->where('hotel_id',$hotel_id)->get();

        return view('usersite::room-list', compact('rooms'));
    }

    public function amenities() {
        $amenities_category = AmenitiesCategory::with('amenities')->active()->get();
        return view('usersite::amenities',compact('amenities_category'));
    }

    public function add_room(Request $request) {
        $hotel_id = Session::get('hotel')->id;
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
        return response()->json(['redirect_url' => route('room-list')]);
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
            
        return response()->json(['redirect_url' => route('photo')]);
    }

    public function save_photos(Request $request) {
        $image_64 = $request->url;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
        $image = str_replace($replace, '', $image_64);     
        $image = str_replace(' ', '+', $image); 
        $imageName = 'Img_'.Str::random(10).'.'.$extension;
        $img =base64_decode($image);
        Storage::disk('public')->put('hotels'.'/'.$imageName, base64_decode($image));

        $hotel_id = Session::get('hotel')->id;

        $hotelphoto = new HotelPhoto();
        $hotelphoto->main_photo = $request->main;
        $hotelphoto->photos     = 'hotels/'.$imageName;
        $hotelphoto->hotel_id  = $hotel_id;
        $hotelphoto->save();

        return response()->json(['redirect_url' => route('policy')]);
    }

    public function add_policy(Request $request) {
        $hotel_id = Session::get('hotel')->id; 

        $Hotel = Hotel::updateOrCreate([ 'id' => $hotel_id ],[
            'cancel_booking' => $request->cancel_select,
            'pay_type'       => $request->guest_pay,
            'check_in'       => $request->check_in,
            'check_out'      => $request->check_out,
        ]);  

        return response()->json(['redirect_url' => route('home.index')]);
    }

    public function deleteProperty($id)
    {
        $hotel = Hotel::where('UUID',$id)->first();
        $room = Room::where('hotel_id',$hotel->id)->first();
        $hotelPhotos = HotelPhoto::where('hotel_id', $hotel->id)->get();
        
        if($room){
            if($room->id == null){
                $roomBeds = HotelBed::where('room_id', $room->id)->delete();
            }
            $roomDelete = Room::where('hotel_id',$hotel->id)->delete();
        }

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

    public function updateProperty(Request $request)
    {
        $hotel_id = $request->hotelId;

        $Hotel   =  Hotel::updateOrCreate([ 'UUID' => $hotel_id ], [
            'property_name' => $request->property_name,
            'description'   => $request->description,
            'star_rating'   => $request->star_rating,
            'street_addess' => $request->address,
            'address_line'  => $request->address_line,
            'country_id'    => $request->country,
            'city_id'       => $request->city,
            'pos_code'      => $request->zipcode
        ]);  
        
        $hotelId = Hotel::where('UUID', $hotel_id)->select('id')->first();
        $contacts = json_decode($request->get('contactDetail'));

        if($contacts){
            foreach($contacts as $contact) {
                if($contact->id != 0) {
                    $hotelContact   =   HotelContact::updateOrCreate([ 'UUID' => $contact->id ], [
                        'name' => $contact->name,
                        'number'   => $contact->phone,
                        'number_optinal' => $contact->phoneOptional
                    ]);  
                }else{
                    $contact_id = '';
                    $hotelContact   =   HotelContact::updateOrCreate([ 'UUID' => $contact_id ], [
                        'name' => $contact->name,
                        'number'   => $contact->phone,
                        'number_optinal' => $contact->phoneOptional,
                        'hotel_id' => $hotelId->id
                    ]);  
                }
            }
        }

        
        return response()->json(['redirect_url' => route('edit.layoutPrice', ['id' => $hotel_id])]);
    }

    public function editLayout($id)
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
        
        return response()->json(['redirect_url' => route('edit.facilities')]);
    }

    public function editFacilities()
    {
        dd('hello');
    }
}
