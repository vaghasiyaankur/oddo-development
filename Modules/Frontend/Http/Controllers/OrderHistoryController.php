<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\HotelBooking;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the review.
     * @return Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $mytime = Carbon::now();
        $orderHistorys = HotelBooking::where('user_id', $userId)->whereDate('end_date', '<=', Carbon::now())->get();
        $reviews = Review::where('user_id', $userId)->get();
        $reviewCount = '';
        $ReviewsPopup = '';
        return view('frontend::orderHistory.index', compact('orderHistorys', 'reviews', 'ReviewsPopup', 'reviewCount'));
    }

    /**
     * Store a newly created review in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $id = '';
        $total = ($request->staffReview + $request->cleanessReview + $request->roomReview + $request->locationReview + $request->breakfastReview + $request->serviceStaffReview + $request->propertyConditionReview + $request->priceQualityReview + $request->amenityReview + $request->internetReview) / 10;

        $review = Review::updateOrCreate(['id' => $id], [
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
            'total_rating' => $total,
            'user_id' => auth()->user()->id,
        ]);

        return response()->json(["success" => "review submit successfully."], 200);
    }

    /**
     * Show the specified review.
     * @param Request $request
     * @return Renderable
     */
    public function show(Request $request)
    {

        // ratingHostel Helper function
        $rating = ratingHotel($request->reviewId);
        $data['reviewCount'] = $rating;

        $data['ReviewsPopup'] = Review::where('UUID', $request->reviewId)->first();
        return view('frontend::orderHistory.view', $data);
    }

    /**
     *list of review
     * @return Renderable
     */
    public function reivewlist()
    {
        $userId = auth()->user()->id;

        $data['mytime'] = Carbon::now();
        $data['orderHistorys'] = HotelBooking::where('user_id', $userId)->whereDate('end_date', '<=', Carbon::now())->get();
        $data['reviews'] = Review::where('user_id', $userId)->get();
        $data['reviewCount'] = '';
        $data['ReviewsPopup'] = '';

        return view('frontend::orderHistory.orderHistory_list', $data);
    }
}
