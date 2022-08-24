<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Hotel;
use App\Models\Amenities;
use App\Models\paymentGetways;

class HotelController extends Controller
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

        $propertyName = request()->propertyName;
        $budgetMin = request()->budgetMin;
        $budgetMax = request()->budgetMax;
        $starRating = request()->starRating;

        $searchProperty = request()->searchProperty;

        // dd($starRating);
        $paymentGateways = paymentGetways::get();
        if($search){
            $search = str_replace(',', ' ', $search);

            $hotels = Hotel::with('country', 'city', 'room')
                    ->orwhere('property_name', 'like', '%'.$search.'%')
                    ->orWhereRelation('country', 'country_name', 'like', '%'.$search.'%')
                    ->orWhereRelation('city', 'name', 'like', '%'.$search.'%')
                    ->whereRelation('room', 'guest_stay_room', $guest)
                    ->whereRelation('room', 'number_of_room', $room)
                    ->active()->latest()->paginate(2);

            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways'))->render();
                return $html;
            }

        } elseif($searchProperty) {
            $hotels = Hotel::with('room')->where('property_name', 'like', '%'.$searchProperty.'%')->active()->latest()->paginate(2);

            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways'))->render();
                return $html;
            }
        } else if($propertyName) {
            $hotels = Hotel::with('room')->where('property_name', 'like', '%'.$propertyName.'%')
            ->where('star_rating', '=' , $starRating)
            ->whereHas('room', function($query) use($budgetMin, $budgetMax) {
                $query->whereBetween('price_room', [$budgetMin, $budgetMax]); })
            ->active()->latest()->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways'))->render();
                return $html;
            }
        } else {
            $hotels = Hotel::active()->latest()->paginate(2);
            if ($request->ajax()) {
                $html = view('frontend::hotel.hotelResult', compact('hotels', 'paymentGateways'))->render();
                return $html;
            }
        }


        $amenities = Amenities::where('featured',1)->active()->get();
        return view('frontend::hotel.index', compact('hotels', 'amenities', 'paymentGateways'));
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
