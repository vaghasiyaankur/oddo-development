<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\City;
use App\Models\PropertyType;
use App\Models\RoomList;
use App\Models\Room;
use App\Models\HotelPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $model = Hotel::class;
    public function run()
    {
        $faker = \Faker\Factory::create();

        
        $propertyTypes = PropertyType::get();
        $cities = City::get();
        
        foreach($propertyTypes as $k => $type){
            foreach($cities as $key => $city){
                $hotel = [
                        'property_name'  => $faker->name,
                        'star_rating' => rand(1,5),
                        'street_addess' => $faker->address,
                        'country_id' => $city->country->id,
                        'city_id' => $city->id,
                        'pos_code' => rand(111111, 999999),
                        'parking_available' => array_rand(['yes','no']),
                        'parking_site' => array_rand(['on','off']),
                        'parking_type' =>  array_rand(['private','pubic']),
                        'breakfast'  => array_rand(['optional','no']),
                        'breakfast_type' => rand(1,5),
                        'language' => array_rand(["english","hindi","Russian"]),
                        'facilities' => rand(1,7),
                        'extra_bed' => array_rand(['yes','no']),
                        'number_extra_bed' => Null,
                        'cancel_booking' => array_rand(['1','2','3','7','14']),
                        'pay_type' => array_rand(['first_night','full_stay  ']),
                        'check_in' => '12:00 AM',
                        'check_out' => '12:00 AM',
                        'amenity_id' => rand(1,13),
                        'property_id' => $type->id,   
                ];

                $hotelEntry = Hotel::create($hotel);

                $roomList =
                    [
                        'room_name'             => $faker->name,
                        'status'                => '1',
                        'room_type_id'          => rand(1,4),
                    ];

                $roomListEntry = RoomList::create($roomList);

                $room = 
                    [
                        'custom_name_room' => $faker->name,
                        'smoking_policy'   => array_rand(['b-smoking','smoking']),
                        'number_of_room'   => rand(1,7),
                        'guest_stay_room'  => Null,
                        'room_size'        => rand(1200,1300),
                        'room_cal_type'    => array_rand(['s-feet','s-meter']),
                        'price_room'       => rand(1200,1300),
                        'room_list_id'     => $roomListEntry->id,
                        'room_type_id'     => $roomListEntry->room_type_id,
                        'hotel_id'         => $hotelEntry->id,
                        'created_at'       => date("Y-m-d H:i:s"),
                        'updated_at'       => date("Y-m-d H:i:s"),
                    ];

                $roomEntry = Room::create($room);

                $photo = [
                        'main_photo'  => rand(1,7),
                        'photos'      => 'hotels/'.$k.$key.'.jpg',
                        'photos_path' => Null,
                        'room_id'     => $roomEntry->id,
                        'hotel_id'    => $hotelEntry->id,
                ];   
                
                $photoEntry = HotelPhoto::create($photo);

                
                // $url = 'https://source.unsplash.com/random/1200x800';
        
                // $contents = file_get_contents($url);
                
                // Storage::disk('public')->put('hotel'.'/'.$hotelEntry->slug, $contents);
            }
        }    
        // $hotels = [
        //     [
        //         'property_name'  => 'one king west hotel',
        //         'star_rating' => '2',
        //         'street_addess' => 'Surendra Nath Banerjee Rd, Moulali',
        //         'country_id' => '1',
        //         'city_id' => '1',
        //         'pos_code' => '700014',
        //         'parking_available' => 'yes',
        //         'parking_site' => 'on',
        //         'parking_type' => 'private',
        //         'breakfast'  => 'optional',
        //         'breakfast_type' => '2',
        //         'language' => '["english"]',
        //         'facilities' => '["1"]',
        //         'extra_bed' => 'yes',
        //         'number_extra_bed' => '2',
        //         'cancel_booking' => '2',
        //         'pay_type' => 'first_night',
        //         'check_in' => '12:00 AM',
        //         'check_out' => '12:00 AM',
        //         'amenity_id' => '1,2',
        //         'property_id' => '1'
        //     ],[
        //         'property_name'  => 'Hotel X Toronto by Library Hotel Collection',
        //         'star_rating' => '5',
        //         'street_addess' => '111 Princes Boulevard',
        //         'country_id' => '1',
        //         'city_id' => '1',
        //         'pos_code' => '700014',
        //         'parking_available' => 'yes',
        //         'parking_site' => 'on',
        //         'parking_type' => 'private',
        //         'breakfast'  => 'optional',
        //         'breakfast_type' => '2',
        //         'language' => '["english","hindi"]',
        //         'facilities' => '["3","5","7"]',
        //         'extra_bed' => 'no',
        //         'number_extra_bed' => Null,
        //         'cancel_booking' => '2',
        //         'pay_type' => 'first_night',
        //         'check_in' => '12:00 AM',
        //         'check_out' => '12:00 AM',
        //         'amenity_id' => '1,2',
        //         'property_id' => '1'   
        //     ]
        // ];
        // foreach ($hotels as $hotel) {
        //     Hotel::create($hotel);
        // }

    }
    
}
