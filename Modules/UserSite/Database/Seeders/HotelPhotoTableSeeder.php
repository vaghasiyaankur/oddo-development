<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelPhoto;

class HotelPhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $model = HotelPhoto::class;

    public function run()
    {

        $HotelPhoto = [
            [
                'main_photo'  => '1',
                'photos'      => 'Hotel/hotel-1.jpg',
                'real_photo' => 'Hotel/hotel-1.jpg',
                'room_id'     => '1',
                'hotel_id'    => '1',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '0',
                'photos'      => 'Hotel/hotel-2.jpg',
                'real_photo' => 'Hotel/hotel-2.jpg',
                'room_id'     => '1',
                'hotel_id'    => '1',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '0',
                'photos'      => 'Hotel/hotel-3.jpg',
                'real_photo' => 'Hotel/hotel-3.jpg',
                'room_id'     => '1',
                'hotel_id'    => '1',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '1',
                'photos'      => 'Hotel/hotel-4.jpg',
                'real_photo' => 'Hotel/hotel-4.jpg',
                'room_id'     => '2',
                'hotel_id'    => '2',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '0',
                'photos'      => 'Hotel/hotel-5.jpg',
                'real_photo' => 'Hotel/hotel-5.jpg',
                'room_id'     => '2',
                'hotel_id'    => '2',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '0',
                'photos'      => 'Hotel/hotel-6.jpg',
                'real_photo' => 'Hotel/hotel-6.jpg',
                'room_id'     => '2',
                'hotel_id'    => '2',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ]
           
        ];

        // HotelPhoto::insert($HotelPhoto);
        // Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
