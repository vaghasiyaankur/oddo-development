<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class HotelRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $model = Room::class;

    public function run()
    {
        // Model::unguard();

        // $this->call("OthersTableSeeder");

        $Room = [
            [
                'custom_name_room' => 'double room',
                'smoking_policy'   => 'b-smoking',
                'number_of_room'   => '2',
                'guest_stay_room'  => Null,
                'room_size'        => '1200',
                'room_cal_type'    => 's-feet',
                'price_room'       => '12000',
                'room_list_id'     => '1',
                'room_type_id'     => '1',
                'hotel_id'         => '1',
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            ],[
                'custom_name_room' => 'Triple room',
                'smoking_policy'   => 'smoking',
                'number_of_room'   => '5',
                'guest_stay_room'  => '10',
                'room_size'        => '1200',
                'room_cal_type'    => 's-meter',
                'price_room'       => '12000',
                'room_list_id'     => '7',
                'room_type_id'     => '3',
                'hotel_id'         => '2',
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
            ]
           
        ];

        // Room::insert($Room);
    }
}
