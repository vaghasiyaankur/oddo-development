<?php

use Carbon\Carbon;
use App\Models\Review;

if(!function_exists("removeWhiteSpace")){

    function ratingHotel($rating){
        $Review = Review::where('UUID', $rating)->first();

        $staff = $Review->staff;
        $cleaness = $Review->cleaness;
        $rooms = $Review->rooms;
        $location = $Review->location;
        $breakfast = $Review->breakfast;
        $service_staff = $Review->service_staff;
        $property = $Review->property;
        $price_quality = $Review->price_quality;
        $amenities = $Review->amenities;
        $internet = $Review->internet;

        $value = ($staff + $cleaness + $rooms + $location + $breakfast + $service_staff + $property + $price_quality + $amenities + $internet) / 10;

        return $value;
    }
}
