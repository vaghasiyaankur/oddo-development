<?php

namespace Modules\UserSite\Database\Seeders;

use App\Models\HotelBooking;
use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the Hotel Booking seeds.
     *
     * @return void
     */
    public function run()
    {

        $HotelBookings = [
            ['2', '1', '1', '1200', '2', '1', '2022-09-01', '2022-09-05', '4'],
            ['2', '2', '2', '2500', '2', '1', '2022-08-21', '2022-08-31', '10'],
            ['2', '3', '3', '3500', '2', '1', '2022-08-05', '2022-08-11', '6'],
            ['2', '3', '3', '3500', '2', '1', '2022-09-09', '2022-09-20', '11'],
            ['2', '3', '3', '3500', '2', '1', '2022-08-25', '2022-08-29', '4'],
        ];

        foreach ($HotelBookings as list($user_id, $hotel_id, $room_id, $rent, $payment_method_id, $status,
            $star_date, $end_date, $day_diff)) {
            HotelBooking::create(
                [
                    'user_id' => $user_id,
                    'hotel_id' => $hotel_id,
                    'room_id' => $room_id,
                    'rent' => $rent,
                    'payment_method_id' => $payment_method_id,
                    'status' => $status,
                    'start_date' => $star_date,
                    'end_date' => $end_date,
                    'day_diff' => $day_diff,
                ]
            );
        }
    }
}
