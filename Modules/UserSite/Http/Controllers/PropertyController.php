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
use App\Models\Facilities;
use App\Models\Amenities;
use App\Models\AmenitiesCategory;

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
        // dd($request->get('contact_name'));
        $companyId = $request->id;
        $count = $request->count;
         
        // $content = $request->contact_name;
                    
       

        // dd($content_name);
 
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


        // $contents = json_decode($request->get('contact_name'));
        // $hotel_contect =  HotelContact::create([
        //         'name' =>   $contents[0]->contects,
        //         'number' =>   $contents[0]->phone,
        //         'hotels_id' => $hotel_id->id
        // ]);   
         
        // $data = array();
        // $hotel_contect =  new HotelContact();
        // foreach($contents as $contect){
            
        //             $hotel_contect->name = $contect->contects;
        //             $hotel_contect->number = $contect->phone;
        //             // $hotel_contect->number_optinal = $contect['optinal'];
        //             $hotel_contact->save();
              
        //     }
            // $hotel_contact->save();
            // dd($hotel_id->id);

                         
        return Response()->json(["success" => true]);

    }

    public function layout_pricing(){
        $room_types = RoomType::active()->get();
        return view('usersite::layout-pricing', compact('room_types'));
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
        // $amenities = Amenities::active()->get();
        // $amenities_category = AmenitiesCategory::active()->get();
        $amenities_category = AmenitiesCategory::with('amenities')->active()->get();
        return view('usersite::amenities',compact('amenities_category'));
    }
   
}
