<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $check_folder = is_dir(public_path('storage/hotels'));
        if (!$check_folder) {
            mkdir(public_path('storage/hotels'));
        }

        $check_folder = is_dir(public_path('storage/hotel'));
        if (!$check_folder) {
            mkdir(public_path('storage/hotel'));
        }

        $faker = \Faker\Factory::create();

        $propertyTypes = \App\Models\PropertyType::get();
        $cities = \App\Models\City::get();

        $value = ['yes', 'no'];
        $parkingSite = ['on', 'off'];
        $parkingType = ['private', 'public'];
        $breakfast = ['yes', 'no'];
        $language = ["english", "hindi", "Russian"];
        $cancel = ['1', '2', '3', '7', '14'];
        $payType = ['first_night', 'full_stay'];
        $smokingPolicy = ['n-smoking', 'smoking', 'b-smoking'];
        $roomCalType = ['s-feet', 's-meter'];
        $user = [2, 3];

        foreach ($propertyTypes as $k => $type) {
            foreach ($cities as $key => $city) {
                $hotel = [
                    'property_name' => $faker->name,
                    'star_rating' => rand(1, 5),
                    'description' => $faker->text,
                    'street_addess' => $faker->address,
                    'country_id' => $city->country_id,
                    'city_id' => $city->id,
                    'pos_code' => rand(111111, 999999),
                    'parking_available' => $value[array_rand($value)],
                    'parking_site' => $parkingSite[array_rand($parkingSite)],
                    'parking_type' => $parkingType[array_rand($parkingType)],
                    'breakfast' => $breakfast[array_rand($breakfast)],
                    'breakfast_type' => rand(1, 5),
                    'language' => $language[array_rand($language)],
                    'facilities_id' => rand(1, 7),
                    'extra_bed' => $value[array_rand($value)],
                    'number_extra_bed' => null,
                    'cancel_booking' => $cancel[array_rand($cancel)],
                    'pay_type' => $payType[array_rand($payType)],
                    'check_in' => '12:00 AM',
                    'check_out' => '12:00 AM',
                    'amenity_id' => rand(1, 13),
                    'property_id' => $type->id,
                    'status' => 1,
                    'user_id' => $user[array_rand($user)],
                    'complete' => 1,
                ];

                $hotelEntry = \App\Models\Hotel::create($hotel);

                $roomList = [
                    'room_name' => $faker->name,
                    'status' => '1',
                    'room_type_id' => rand(1, 4),
                ];

                $roomListEntry = \App\Models\RoomList::create($roomList);

                $room = [
                    'custom_name_room' => $faker->name,
                    'smoking_policy' => $smokingPolicy[array_rand($smokingPolicy)],
                    'number_of_room' => rand(1, 3),
                    'guest_stay_room' => rand(1, 3),
                    'room_size' => rand(1200, 1300),
                    'room_cal_type' => $roomCalType[array_rand($roomCalType)],
                    'bathroom_private' => $value[array_rand($value)],
                    'bathroom_item' => rand(1, 10),
                    'price_room' => rand(1200, 1300),
                    'room_list_id' => $roomListEntry->id,
                    'room_type_id' => $roomListEntry->room_type_id,
                    'hotel_id' => $hotelEntry->id,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ];

                $roomEntry = \App\Models\Room::create($room);

                $bed = [
                    'no_of_bed' => rand(1, 3),
                    'bed_id' => rand(1, 3),
                    'room_id' => $roomEntry->id,
                ];

                $bedEntry = \App\Models\HotelBed::create($bed);

                $photo = [
                    'main_photo' => '1',
                    'photos' => 'hotels/' . $k . $key . '.jpg',
                    'real_photo' => 'hotel/' . $k . $key . '.jpg',
                    'room_id' => $roomEntry->id,
                    'hotel_id' => $hotelEntry->id,
                    'category_id' => '1',
                ];

                $photoEntry = \App\Models\HotelPhoto::create($photo);
            }
        }
    }

}
