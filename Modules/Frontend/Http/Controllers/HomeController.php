<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\City;
use App\Models\Partner;
use App\Models\Hotel;
use App\Models\LogoFavicon;
use App\Models\PropertyType;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        $search = request()->search;
        $checkIn = request()->checkIn;
        $checkOut = request()->checkOut;
        $guest =  request()->guest;
        $room = request()->room;
        $bed = explode(',' , request()->bed);
        // dd($search);
        if($search){
            $search = str_replace(',', ' ', $search);
            $hotels = Hotel::with('country', 'city', 'room' )
                    ->orWhereRelation('city', 'name', 'like', '%'.$search.'%')
                    ->whereRelation('room', 'guest_stay_room', $guest)
                    ->whereRelation('room', 'number_of_room', $room)
                    ->orwhereHas('hotelBed.bedType', function($query) use ($bed) {
                        $query->whereIn('bed_type', $bed);
                    })
                    ->active()->latest()->paginate(2);

            $hotelAmounts = array();

            foreach($hotels as $hotel){
                $amount = $hotel->room->price_room;
                $hotel_amount = $amount * $room;
                $hotelAmounts[] = array($hotel->id => $hotel_amount);
            }

            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'hotelAmounts'))->render();
                return $html;
            }

        }  else {
            $hotels = Hotel::active()->latest()->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels'))->render();
                return $html;
            }
        }

        $cities = City::where('featured',1)->get();
        $propertyTypes = PropertyType::active()->get();
        $partners = Partner::get();
        return view('frontend::home.index',compact('cities','partners', 'propertyTypes'));
    }

    public static function logoFavicon()
    {
        $LogoFavicon = LogoFavicon::first();
        return $LogoFavicon;
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
