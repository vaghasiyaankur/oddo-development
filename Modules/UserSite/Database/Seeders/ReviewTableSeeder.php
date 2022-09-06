<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Reviews = [
            ['3', '2', '1', '4', '5', '2', '4', '3', '1', '5', '3', 'Accommodation for travellers often offering restaurants', '1', '1', '1'],
            ['3', '2', '1', '4', '5', '2', '4', '3', '1', '5', '3', 'Private home with separate living', '2', '1', '1'],
            ['3', '2', '1', '4', '5', '2', '4', '3', '1', '5', '3', 'A shared home where the guest has. ', '2', '1', '1'],
            ['3', '2', '1', '4', '5', '2', '4', '3', '1', '5', '3', 'Budget accommodation with mostly', '1', '2', '2'],
            ['3', '2', '1', '4', '5', '2', '4', '3', '1', '5', '3', 'Private farm with simple', '2', '2', '2'],
        ];

        foreach ($Reviews as  list($staff, $cleaness, $rooms, $location, $breakfast, $service_staff, $property, $price_quality, $amenities, $internet, $total_rating, $feedback, $user_id, $hotel_id, $room_id)) {
            Review::create([
                "staff" => $staff,
                "cleaness" => $cleaness,
                "rooms" => $rooms,
                "location" => $location,
                "breakfast" => $breakfast,
                "service_staff" => $service_staff,
                "property" => $property,
                "price_quality" => $price_quality,
                "amenities" => $amenities,
                "internet" => $internet,
                "total_rating" => $total_rating,
                "feedback" => $feedback,
                "user_id" => $user_id,
                "hotel_id" => $hotel_id,
                "room_id" => $room_id,
            ]);
        }
    }
}
