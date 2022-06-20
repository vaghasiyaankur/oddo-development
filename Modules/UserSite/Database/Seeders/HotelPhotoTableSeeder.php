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
                'photos'      => 'Hotel/nav-img1.png',
                'photos_path' => Null,
                'room_id'     => '1',
                'hotel_id'    => '1',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '0',
                'photos'      => 'Hotel/nav-img2.png',
                'photos_path' => Null,
                'room_id'     => '1',
                'hotel_id'    => '1',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '0',
                'photos'      => 'Hotel/nav-img3.png',
                'photos_path' => Null,
                'room_id'     => '1',
                'hotel_id'    => '1',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '1',
                'photos'      => 'Hotel/nav-img4.png',
                'photos_path' => Null,
                'room_id'     => '2',
                'hotel_id'    => '2',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '0',
                'photos'      => 'Hotel/nav-img5.png',
                'photos_path' => Null,
                'room_id'     => '2',
                'hotel_id'    => '2',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],[
                'main_photo'  => '0',
                'photos'      => 'Hotel/nav-img6.png',
                'photos_path' => Null,
                'room_id'     => '2',
                'hotel_id'    => '2',
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ]
           
        ];

        HotelPhoto::insert($HotelPhoto);
        // Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
