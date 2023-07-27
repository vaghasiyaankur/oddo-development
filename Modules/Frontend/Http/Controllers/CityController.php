<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\City;
use App\Models\HotelBooking;
use App\Models\PropertyType;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of cities based on the number of hotel bookings made in each city.
     *
     * @return Renderable
     */
    public function index()
    {
        $cities = HotelBooking::
            join('hotels', 'hotel_bookings.hotel_id', '=', 'hotels.id')
            ->join('cities', 'hotels.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->select('city_id', DB::raw('count(*) as city_count'), 'background_image', 'name', 'city_id', 'icon')
            ->groupBy('city_id')->get()->sortByDesc('city_count');

        return view('frontend::city.index', compact('cities'));
    }

    /**
     * Explore cities
     *
     * @return Renderable
     */
    public function explore()
    {
        $slug = request()->slug;
        $city = City::where('slug', $slug)->first();
        $properties = PropertyType::get();
        return view('frontend::city.explore', compact('city', 'properties'));
    }

    /**
     * Generate HTML content based on the target specified in the request.
     *
     * @param Request $request
     * @return string $html
     */
    public function Destination(Request $request)
    {
        if ($request->target == 'Cities') {

            $cities = HotelBooking::
                join('hotels', 'hotel_bookings.hotel_id', '=', 'hotels.id')
                ->join('cities', 'hotels.city_id', '=', 'cities.id')
                ->join('countries', 'cities.country_id', '=', 'countries.id')
                ->select('city_id', DB::raw('count(*) as city_count'), 'background_image', 'name', 'city_id', 'icon')
                ->groupBy('city_id')->get()->sortByDesc('city_count');
            $html = view('frontend::city.cities', compact('cities'));
        } else {
            $hotels = HotelBooking::withWhereHas('hotel', function($q){
                $q->select('id', 'UUID', 'property_name', 'slug', 'city_id', 'country_id', 'status');
            })
                ->select('hotel_id', DB::raw('count(*) as hotel_count'))
                ->groupBy('hotel_id')
                ->get()->sortByDesc('hotel_count');

            $html = view('frontend::city.hotel', compact('hotels'))->render();
        }
        return $html;
    }
}