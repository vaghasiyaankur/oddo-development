<?php

namespace Modules\UserSite\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\PropertyType;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\HotelContact;
use App\Models\RoomType;
use App\Models\RoomList;

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
        // dd($request->property_name);
        $companyId = $request->id;
 
        $Hotel   =   Hotel::updateOrCreate(
                    [
                     'id' => $companyId
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
        
                    
        $hotel_contact = HotelContact::updateOrCreate(
            [
             'id' => $companyId
            ],
            [
                'name'             => $request->contact_name,
                'number'           => $request->contact_phone,
                'number_optinal'   => $request->contact_phone_optional,
                'hotels_id'        => $hotel_id->id
            ]);         
                         
        return Response()->json(["success" => true]);

    }

    public function layout_pricing(){
        $room_types = RoomType::active()->get();
        return view('usersite::layout-pricing', compact('room_types'));
    }

    public function facilities(){
        return view('usersite::facilities');
    }
    
    public function room_lists(Request $request)
    {
        $room_type_id = $request->room_type_id;
        $roomlist = RoomType::where('id',$room_type_id)->with('room_lists')->active()->get();
        return response()->json([
            'roomlist' => $roomlist
        ]);
    }
   
}
