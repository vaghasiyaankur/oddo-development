<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\City;
use App\Models\Hotel;
use App\Models\PropertyType;
use App\Models\HotelBooking;
use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $hotels = HotelBooking::with('hotel')->select('hotel_id', DB::raw('count(*) as hotel_count'))->groupBy('hotel_id')->get()->sortByDesc('hotel_id');

        $cities = HotelBooking::
                join('hotels', 'hotel_bookings.hotel_id', '=', 'hotels.id')
                ->join('cities', 'hotels.city_id', '=', 'cities.id')
                ->join('countries', 'cities.country_id', '=', 'countries.id')
                ->select('city_id', DB::raw('count(*) as city_count'),'background_image', 'name', 'city_id', 'icon')
                ->groupBy('city_id')->get()->sortByDesc('city_count');
        
        return view('frontend::city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('testing::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('testing::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('testing::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Explore cities
     */
    public function explore()
    {
        $slug = request()->slug;
        $city = City::where('slug', $slug)->first();
        $properties = PropertyType::get();
        return view('frontend::city.explore', compact('city' , 'properties'));
    }

    public function Destination(Request $request){
        if($request->target == 'Cities'){
            
        $cities = HotelBooking::
                join('hotels', 'hotel_bookings.hotel_id', '=', 'hotels.id')
                ->join('cities', 'hotels.city_id', '=', 'cities.id')
                ->join('countries', 'cities.country_id', '=', 'countries.id')
                ->select('city_id', DB::raw('count(*) as city_count'),'background_image', 'name', 'city_id', 'icon')
                ->groupBy('city_id')->get()->sortByDesc('city_count');
            $html = view('frontend::city.cities', compact('cities'));
        }
        else{
            $hotels = HotelBooking::with('hotel')->select('hotel_id', DB::raw('count(*) as hotel_count'))->groupBy('hotel_id')->get()->sortByDesc('hotel_count');
            $html = view('frontend::city.hotel', compact('hotels'))->render();
            // dd($hotels); 
        }
        return $html;
    }
}
