<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Hotel;
use App\Models\Amenities;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // dd( request()->guest);
        $search = explode(',' , request()->search);
        $checkIn = request()->checkIn;
        $checkOut = request()->checkOut;
        $guest =  request()->guest;
        $room = request()->room;
        $bed = explode(',' , request()->bed);
        
        if(count($search) != 1){
             $hotels = Hotel::where(function($query) use($search){
                foreach($search as $s) {
                    $query->orWhereHas('country', function ($query2) use($s){
                        $query2->where('country_name', 'like', '%'.$s.'%');
                    });
                    $query->orWhereHas('city', function ($query2) use($s){
                        $query2->where('name', 'like', '%'.$s.'%');
                    });
                }
            })->WhereHas('room' , function($query){
                $query->where('guest_stay_room', request()->guest);
            })->get();
            // dd($hotels);
        }else{
            $hotels = Hotel::get();
        }

        $amenities = Amenities::where('featured',1)->active()->get();
        return view('frontend::hotel.index', compact('hotels', 'amenities'));
    }

    public function hotelDetail(){
        $slug = request()->slug;
        $hotel = Hotel::where('slug', $slug)->first();
        return view('frontend::hotel.hotelDetails', compact('hotel'));
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
}
