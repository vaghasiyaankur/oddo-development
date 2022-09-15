<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Hotel;
use App\Models\Amenities;
use App\Models\paymentGetways;
use App\Models\HotelBooking;
use App\Models\Review;
use App\Models\PropertyType; 
use DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $propertyType = $request->propertyType;

        $search = request()->search;
        $checkIn = request()->checkIn;
        $checkOut = request()->checkOut;
        $guest =  request()->guest;
        $room = request()->room;
        $bed = explode(',' , request()->bed);
        $propertyTypeName = explode(',' , request()->propertyTypeName); 

        $propertyName = request()->propertyName;
        $budgetMin = request()->budgetMin;
        $budgetMax = request()->budgetMax;
        $starRating = request()->starRating;

        $searchProperty = request()->searchProperty;

        $booking = HotelBooking::select('UUID')->latest()->first();

        $paymentGateways = paymentGetways::active()->get();
        $hotelAmounts = array();

        $propertyTypes = '';
        $propertyTypeCounts = [];
        if($search){
            $search = str_replace(',', ' ', $search);

            $hotels = Hotel::with('country', 'city', 'room' )
                    // ->orwhere('property_name', 'like', '%'.$search.'%')
                    // ->orWhereRelation('country', 'country_name', 'like', '%'.$search.'%')
                    ->whereRelation('city', 'name', 'like', '%'.$search.'%')
                    ->whereRelation('room', 'guest_stay_room', $guest)
                    ->whereRelation('room', 'number_of_room', $room)
                    ->whereHas('hotelBed.bedType', function($query) use ($bed) {
                        $query->whereIn('bed_type', $bed);
                    });
            
            $propertyTypeCounts = $hotels->withCount('propertytype')->active()->latest()->paginate(10);
            
            if ($request->has('propertyTypeName')) {
            $hotels = $hotels->whereHas('propertytype', function($query) use ($propertyTypeName){
                        $query->WhereIn('slug', $propertyTypeName);
                    });
            }

            $hotels = $hotels->active()->latest()->paginate(10);

                $hotelAmounts = array();
                if($hotels){
                    foreach($hotels as $hotel){
                    $amount = $hotel->room->price_room;
                    $hotel_amount = $amount * $room;
                    $hotelAmounts[] = array($hotel->id => $hotel_amount);
                }
            }

            $propertyTypes = PropertyType::active()->get();
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways','booking', 'hotelAmounts', 'propertyTypes', 'propertyTypeCounts'))->render();
                return $html;
            }

        } elseif($searchProperty) {
            $hotels = Hotel::with('room')->where('property_name', 'like', '%'.$searchProperty.'%')->active()->latest()->paginate(2);

            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways','booking', 'hotelAmounts'))->render();
                return $html;
            }
        } else if($propertyName) {
            $hotels = Hotel::with('room')->where('property_name', 'like', '%'.$propertyName.'%')
            ->where('star_rating', '=' , $starRating)
            ->whereHas('room', function($query) use($budgetMin, $budgetMax) {
                $query->whereBetween('price_room', [$budgetMin, $budgetMax]); })
            ->active()->latest()->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways','booking', 'hotelAmounts'))->render();
                return $html;
            }
        } else if($propertyType){

            $propertyTypeId = PropertyType::whereUuid($propertyType)->pluck('id')->first();
            $hotels = Hotel::with('room')->whereProperty_id($propertyTypeId)->paginate(2); 
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways','booking', 'hotelAmounts'))->render();
                return $html;
            }

        } else {
            $hotels = Hotel::active()->latest()->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways','booking', 'hotelAmounts'))->render();
                return $html;
            }
        }

        $amenities = Amenities::where('featured',1)->active()->get();
        return view('frontend::hotel.index', compact('hotels', 'amenities', 'paymentGateways','booking', 'hotelAmounts', 'propertyTypes', 'propertyTypeCounts'));
    }

    public function hotelDetail(){
        $slug = request()->slug;
        $hotel = Hotel::where('slug', $slug)->first();
        $hotelRating = listHotelRating($hotel->id);
        return view('frontend::hotel.hotelDetails', compact('hotel', 'hotelRating'));
    }

    public function hotelReview(Request $request)
    {
        $hotelId = $request->hotel_id;
        $hotel = Hotel::where('UUID', $hotelId)->first();

        if ($hotel == null) {
            $data = array(
                'review' => '',
                'rating' => '',
                'hotelData'  => $hotel
            );  
        }else{
            $data['hotelRating'] = listHotelRating($hotel->id);
        }

        return view('frontend::hotel.review', $data);
    }
}
