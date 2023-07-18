<?php

namespace Modules\UserSite\Database\Seeders;

use App\Models\RoomList;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RoomListTableSeeder extends Seeder
{
    /**
     * Run the RoomList seeds.
     *
     * @return void
     */
    public function run()
    {
        $RoomList = [
            [
                'room_name' => 'Budget Single Room',
                'slug' => Str::slug('Budget Single Room'),
                'status' => '1',
                'room_type_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'room_name' => 'Deluxe Single Room',
                'slug' => Str::slug('Deluxe Single Room'),
                'status' => '1',
                'room_type_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'room_name' => 'Deluxe Single Room with Balcony',
                'slug' => Str::slug('Deluxe Single Room with Balcony'),
                'status' => '1',
                'room_type_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'room_name' => 'Economy Single Room',
                'slug' => Str::slug('Economy Single Room'),
                'status' => '1',
                'room_type_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'room_name' => 'Budget Double Room',
                'slug' => Str::slug('Budget Double Room'),
                'status' => '1',
                'room_type_id' => '2',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'room_name' => 'Business Double Room with Gym Access',
                'slug' => Str::slug('Business Double Room with Gym Access'),
                'status' => '1',
                'room_type_id' => '2',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'room_name' => 'Budget Twin Room',
                'slug' => Str::slug('Budget Twin Room'),
                'status' => '1',
                'room_type_id' => '3',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'room_name' => 'Deluxe Twin Room',
                'slug' => Str::slug('Deluxe Twin Room'),
                'status' => '1',
                'room_type_id' => '3',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'room_name' => 'Comfort Quadruple Room',
                'slug' => Str::slug('Comfort Quadruple Room'),
                'status' => '1',
                'room_type_id' => '4',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'room_name' => 'Deluxe Quadruple Room',
                'slug' => Str::slug('Deluxe Quadruple Room'),
                'status' => '1',
                'room_type_id' => '4',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

        ];

        // \App\Models\RoomList::insert($RoomList);

    }
}
