<?php

use App\Models\Hotel;
use App\Models\Review;

if (!function_exists("removeWhiteSpace")) {

    /**
     * @param int $id
     *
     * @return array<SomeConstants::*, mixed>
     */
    function listHotelRating($id)
    {
        $hotel = Hotel::where('id', $id)->first();
        $reviewData = Review::where('hotel_id', $id)->get();
        $totalCount = $reviewData->count();

        if ($totalCount) {
            $review = Review::select(array(
                DB::raw('SUM(staff)/' . $totalCount . ' as staff'),
                DB::raw('SUM(cleaness)/' . $totalCount . ' as cleaness'),
                DB::raw('SUM(rooms)/' . $totalCount . ' as rooms'),
                DB::raw('SUM(location)/' . $totalCount . ' as location'),
                DB::raw('SUM(breakfast)/' . $totalCount . ' as breakfast'),
                DB::raw('SUM(service_staff)/' . $totalCount . ' as service_staff'),
                DB::raw('SUM(property)/' . $totalCount . ' as property'),
                DB::raw('SUM(price_quality)/' . $totalCount . ' as price_quality'),
                DB::raw('SUM(amenities)/' . $totalCount . ' as amenities'),
                DB::raw('SUM(internet)/' . $totalCount . ' as internet'),
                DB::raw('SUM(total_rating)/' . $totalCount . ' as total_rating'),
            ))->where('hotel_id', $id)->first();

            $rating = (
                ($review->staff) + ($review->cleaness) + ($review->rooms) +
                ($review->location) + ($review->breakfast) + ($review->service_staff) +
                ($review->property) + ($review->price_quality) + ($review->amenities) +
                ($review->internet)
            ) / 10;
        } else {
            $review = '';
            $rating = '';
        }

        $reviewCount = array(
            'review' => $review,
            'rating' => $rating,
            'hotelData' => $hotel,
            'hotelReviews' => $reviewData,
        );

        return $reviewCount;
    }
}
