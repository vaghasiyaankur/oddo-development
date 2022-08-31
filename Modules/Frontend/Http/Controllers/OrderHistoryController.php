<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Review;
use App\Models\HotelBooking;
use Carbon\Carbon;

class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $mytime = Carbon::now();
        // dd($mytime);

        $orderHistorys = HotelBooking::where('user_id', $userId)->whereDate('end_date', '<=', Carbon::now())->get();
        $reviews = Review::where('user_id', $userId)->get();
        return view('frontend::orderHistory.index', compact('orderHistorys', 'reviews'));
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

        $id = '';
        $amenity = Review::updateOrCreate([ 'id' => $id ], [
           'staff' => $request->staffReview,
           'cleaness' => $request->cleanessReview,
           'rooms' => $request->roomReview,
           'location' => $request->locationReview,
           'breakfast' => $request->breakfastReview,
           'service_staff' => $request->serviceStaffReview,
           'property' => $request->propertyConditionReview,
           'price_quality' => $request->priceQualityReview,
           'amenities' => $request->amenityReview,
           'internet' => $request->internetReview,
           'feedback' => $request->feedbackReview,
           'hotel_id' => $request->hotel_id,
           'room_id' => $request->room_id,
           'user_id' => auth()->user()->id
        ]);

        return response()->json(["success" => "review submit successfully."], 200);
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
