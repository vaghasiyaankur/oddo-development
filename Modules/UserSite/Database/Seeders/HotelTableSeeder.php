<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

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
        
        $Hotel = [
            [
                'property_name'  => 'one king west hotel',
                'star_rating' => '2',
                'street_addess' => 'Surendra Nath Banerjee Rd, Moulali',
                'country' => '1',
                'city' => '1',
                'pos_code' => '700014',
                'parking_available' => 'yes',
                'parking_site' => 'on',
                'parking_type' => 'private',
                'breakfast'  => 'optional',
                'breakfast_type' => '2',
                'language' => '["english"]',
                'facilities' => '["1"]',
                'extra_bed' => 'yes',
                'number_extra_bed' => '2',
                'cancel_booking' => '2',
                'pay_type' => 'first_night',
                'check_in' => '12:00 AM',
                'check_out' => '12:00 AM',
                'amenity_id' => '1,2',
                'property_id' => '1'
            ],[
                'property_name'  => 'Hotel X Toronto by Library Hotel Collection',
                'star_rating' => '5',
                'street_addess' => '111 Princes Boulevard',
                'country' => '1',
                'city' => '1',
                'pos_code' => '700014',
                'parking_available' => 'yes',
                'parking_site' => 'on',
                'parking_type' => 'private',
                'breakfast'  => 'optional',
                'breakfast_type' => '2',
                'language' => '["english","hindi"]',
                'facilities' => '["3","5","7"]',
                'extra_bed' => 'no',
                'number_extra_bed' => Null,
                'cancel_booking' => '2',
                'pay_type' => 'first_night',
                'check_in' => '12:00 AM',
                'check_out' => '12:00 AM',
                'amenity_id' => '1,2',
                'property_id' => '1'   
            ]
        ];

        Hotel::insert($Hotel);
    }
}
