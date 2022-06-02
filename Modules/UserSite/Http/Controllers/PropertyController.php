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
        return view('usersite::facilities', compact('facilities'));
    }
    
    public function room_lists(Request $request)
    {
        $room_type_id = $request->room_type_id;
        $roomlist = RoomType::where('id',$room_type_id)->with('room_lists')->active()->get();
        return response()->json([
            'roomlist' => $roomlist
        ]);
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

        $room = Room::get();
        return response()->json(['status' => 1,  'redirect_url' => route('room-list', ['room' => $room])]);


    }
   
}
