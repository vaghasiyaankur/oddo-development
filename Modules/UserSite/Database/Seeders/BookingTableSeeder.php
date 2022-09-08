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
            ['2', '1', '1', '1200', '2', '1', '01-09-2022', '05-09-2022', '4' ],
            ['2', '2', '2', '2500', '2', '1', '21-08-2022', '31-08-2022', '10' ],
            ['2', '3', '3', '3500', '2', '1', '05-08-2022', '11-08-2022', '6' ],
            ['2', '3', '3', '3500', '2', '1', '09-09-2022', '20-09-2022', '11' ],
            ['2', '3', '3', '3500', '2', '1', '25-08-2022', '29-08-2022', '4' ],
        ];

        foreach ($HotelBookings as  list($user_id, $hotel_id, $room_id, $rent, $payment_method_id, $status, $star_date, $end_date, $day_diff)) {
            HotelBooking::create([
                'user_id' => $user_id,
                'hotel_id' => $hotel_id,
                'room_id' => $room_id,
                'rent' => $rent,
                'payment_method_id' => $payment_method_id,
                'status' => $status,
                'start_date' => $star_date,
                'end_date' => $end_date,
                'day_diff' => $day_diff,
            ]);
        }
    }
}
