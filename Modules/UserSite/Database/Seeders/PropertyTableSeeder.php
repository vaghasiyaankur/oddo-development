<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyType;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertytype = [
                            [
                                'type'             => 'Hotel',
                                'description'      => 'Accommodation for travellers often offering restaurants, meeting rooms and other guest services',
                                'status'           => '1',
                                'slug'             => \Str::slug('Hotel'),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ],
                            [
                                'type'             => 'Aparthotel',
                                'description'      => 'A self-catering apartment with some hotel facilities like a reception desk',
                                'status'           => '1',
                                'slug'             => \Str::slug('Aparthotel'),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ],
                            [
                                'type'             => 'Homestay',
                                'description'      => 'A shared home where the guest has a private room and the host lives and is on site. ',
                                'status'           => '1',
                                'slug'             => \Str::slug('Homestay'),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ],
                            [
                                'type'             => 'Hostel',
                                'description'      => 'Budget accommodation with mostly dorm-style bedding and a social atmosphere',
                                'status'           => '1',
                                'slug'             => \Str::slug('Hostel'),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ],
                            [
                                'type'             => 'Capsule hotel',
                                'description'      => 'Extremely small units or capsules offering cheap and basic overnight accommodation',
                                'status'           => '1',
                                'slug'             => \Str::slug('Capsule hotel'),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ],
                            [
                                'type'             => 'Farm stay',
                                'description'      => 'Private farm with simple accommodation',
                                'status'           => '1',
                                'slug'             => \Str::slug('Farm stay'),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ],
                            [
                                'type'             => 'Bed and breakfast',
                                'description'      => 'Private home offering overnight stays and breakfast',
                                'status'           => '1',
                                'slug'             => \Str::slug('Bed and breakfast'),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ],
                            [
                                'type'             => 'Guest house',
                                'description'      => 'Private home with separate living facilities for host and guest',
                                'status'           => '1',
                                'slug'             => \Str::slug('Guest house'),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ],
                            [
                                'type'             => 'Country house',
                                'description'      => 'Private home with simple accommodation in the countryside',
                                'status'           => '1',
                                'slug'             => \Str::slug('Country house'),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                            ],
                        
                        ];

        PropertyType::insert($propertytype);
    }
}
