<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelBooking;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $HotelBookings = [
            ['2', '1', '1', '1200', '2', '1', '2022-09-01', '2022-09-05'],
            ['2', '2', '2', '2500', '2', '1', '2022-08-21', '2022-08-31'],
            ['2', '3', '3', '3500', '2', '1', '2022-08-5', '2022-08-11'],
        ];

        foreach ($HotelBookings as  list($user_id, $hotel_id, $room_id, $rent, $payment_method_id, $status, $star_date, $end_date)) {
            HotelBooking::create([
                'user_id' => $user_id,
                'hotel_id' => $hotel_id,
                'room_id' => $room_id,
                'rent' => $rent,
                'payment_method_id' => $payment_method_id,
                'status' => $status,
                'start_date' => $star_date,
                'end_date' => $end_date,
            ]);
        }
    }
}
