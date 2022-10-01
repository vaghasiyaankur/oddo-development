<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\City;
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
        $hotels = HotelBooking::with('hotel')->select('hotel_id', DB::raw('count(*) as hotel_count'))->groupBy('hotel_id')->get();
        $cities = City::active()->get();
        return view('frontend::city.index', compact('cities', 'hotels'));
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
}
