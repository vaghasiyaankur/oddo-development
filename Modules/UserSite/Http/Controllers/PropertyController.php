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
use Modules\UserSite\Entities\HotelPhoto;

class PropertyController extends Controller
{

    public function category(){
        $propertys = PropertyType::active()->get();
        return view('usersite::property-category', compact('propertys'));
    }

    public function property_form(){
        $countrys = Country::active()->get();
        return view('usersite::add-property-form', compact('countrys'));
    }

    public function property_submit(Request $request){
        $id = $request->id;
        $count = $request->count;
 
        $Hotel   =   Hotel::updateOrCreate(
                    [
                        'id' => $id
                    ],
                    [
                        'property_name' => $request->property_name,
                        'star_rating'   => $request->star_rating,
                        'street_addess' => $request->address,
                        'address_line'  => $request->address_line,
                        'country'       => $request->country,
                        'city'          => $request->city,
                        'pos_code'      => $request->zipcode
                    ]);  
        
        $hotel_id = Hotel::latest('created_at')->take(1)->first();
        Session::put('hotel', $hotel_id);

        $contents = json_decode($request->get('contact_name'));

        foreach($contents as $contect){
            $Hotel   =   HotelContact::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $contect->contects,
                'number'   => $contect->phone,
                'number_optinal' => $contect->optinal,
                'hotels_id' => $hotel_id->id,
            ]);  
        }

        return response()->json(['status' => 1, 'redirect_url' => route('layout-form')]);
    }




    public function layout_pricing(){
        $room_types = RoomType::active()->get();
        $beds = BedType::active()->get();
        return view('usersite::layout-pricing', compact('room_types', 'beds'));
    }

    public function facilities(){
        $facilities = Facilities::active()->get();
        $food_types = FoodType::active()->get();
        return view('usersite::facilities', compact('facilities', 'food_types'));
    }
    
    public function room_list(Request $request)
    {
        $room_type_id = $request->room_type_id;
        $roomlist = RoomType::where('id',$room_type_id)->with('room_lists')->active()->get();
        return response()->json([
            'roomlist' => $roomlist
        ]);
    }

    public function room_lists() {
        $hotel_id = Session::get('hotel')->id;
        $rooms = Room::with('roomlist')->where('hotel_id',$hotel_id)->get();

        return view('usersite::room-list', compact('rooms'));
    }

    public function amenities(){
        $amenities_category = AmenitiesCategory::with('amenities')->active()->get();
        return view('usersite::amenities',compact('amenities_category'));
    }

    public function add_room(Request $request) {
        $hotel_id = Session::get('hotel')->id;
        $id = $request->id;
        $Hotel   =   Room::updateOrCreate(
            [
             'id' => $id
            ],
            [
                'smoking_policy'   => $request->smoking_area,
                'custom_name_room' => $request->custom_name,
                'number_of_room'   => $request->number_of_room,
                'guest_stay_room'  => $request->number_of_guest,
                'room_size'        => $request->room_size,
                'room_cal_type'    => $request->room_size_feet,
                'price_room'       => $request->bed_price,
                'room_list_id'     => $request->room_name_select,
                'room_type_id'     => $request->room_type,
                'hotel_id'         => $hotel_id
            ]);  

        $room_id = Room::latest('created_at')->take(1)->first();

        $beds = json_decode($request->get('bed_size'));
            foreach($beds as $bed){
                $Hotel   =   HotelBed::updateOrCreate(
                    [
                     'id' => $id
                    ],
                    [
                        'no_of_bed' => $bed->number_of_bed,
                        'bed_id'   => $bed->bed_size,
                        'room_id' => $room_id->id,
                    ]);  
            }
        return response()->json(['status' => 1,  'redirect_url' => route('room-list')]);
    }

    public function add_facilities(Request $request){

        $lang = explode(",", $request['language']);
        $language = array_unique($lang);  

        $hotel_id = Session::get('hotel')->id; 

        $Hotel   =   Hotel::updateOrCreate(
            [
                'id' => $hotel_id
            ],
            [
                'parking_available'  => $request->parking_avaliable,
                'parking_type'       => $request->parking_type,
                'parking_site'       => $request->parking_site,
                'breakfast'          => $request->brackfast_select,
                'breakfast_price'    => $request->price_breakfast,
                'breakfast_type'     => $request->food_type_val,
                'facilities'         => $request['facilities'],
                'language'           => $language
            ]);  
        
            return response()->json(['status' => 1,  'redirect_url' => route('amenities')]);
    }

    public function add_amenities(Request $request){

        $hotel_id = Session::get('hotel')->id; 

        $Hotel   =   Hotel::updateOrCreate(
            [
                'id' => $hotel_id
            ],
            [
                'extra_bed'        => $request->extra_bed,
                'number_extra_bed' => $request->extra_no_of_bed,
                'amenity_id'       => $request['amenities'],
            ]);  
            
        return response()->json(['status' => 1,  'redirect_url' => route('amenities')]);
    }

    public function save_photos(Request $request)
    {   
        // $hotel_id = Session::get('hotel')->id; 
        // $files =$request->get('file_name'); 
        // $files = json_decode($request->get('file_name')); 
        dd($request);
        // $files =$request->get('files');
        // dd($files);
        // // $files = $request->get('file');
        // $images = [];

        // foreach ($files as $key => $file) {
        //     $imageName = time().rand(1,99).'.'.$file->extension();  
        //     $file->move(public_path('images'), $imageName);
        //     $images[]['name'] = $imageName;
        // }

        // // foreach ($images as $key => $image) {

        // //     HotelPhoto::create($image);
        // // }
        // dd($files);
        
    }
   
}
