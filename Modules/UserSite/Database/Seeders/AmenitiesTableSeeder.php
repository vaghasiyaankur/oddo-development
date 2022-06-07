<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Amenities;
use App\Models\AmenitiesCategory;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $amenities = [
                        [
                            'amenities'             => 'Bidet',
                            'slug'                  => \Str::slug('Bidet'),
                            'status'                => '1',
                            'amenities_category_id' => '1'
                        ],

                        [
                            'amenities'             => 'Toilet paper',
                            'slug'                  => \Str::slug('Toilet paper'),
                            'status'                => '1',
                            'amenities_category_id' => '1'
                        ],

                        [
                            'amenities'             => 'Bath',
                            'slug'                  => \Str::slug('Bath'),
                            'status'                => '1',
                            'amenities_category_id' => '1'
                        ],
                        //  Food & drink
                        [
                            'amenities'             => 'Dining area',
                            'slug'                  => \Str::slug('Dining area'),
                            'status'                => '1',
                            'amenities_category_id' => '2'
                        ],
                        [
                            'amenities'             => 'Dining table',
                            'slug'                  => \Str::slug('Dining table'),
                            'status'                => '1',
                            'amenities_category_id' => '2'
                        ],
                        [
                            'amenities'             => 'Barbecue',
                            'slug'                  => \Str::slug('Barbecue'),
                            'status'                => '1',
                            'amenities_category_id' => '2'
                        ],
                        // Media & technology
                        [
                            'amenities'             => 'Computer',
                            'slug'                  => \Str::slug('Computer'),
                            'status'                => '1',
                            'amenities_category_id' => '3'
                        ],
                        [
                            'amenities'             => 'Game console',
                            'slug'                  => \Str::slug('Game console'),
                            'status'                => '1',
                            'amenities_category_id' => '3'
                        ],
                        [
                            'amenities'             => 'Laptop',
                            'slug'                  => \Str::slug('Laptop'),
                            'status'                => '1',
                            'amenities_category_id' => '3'
                        ],
                        // Room amenities
                        [
                            'amenities'             => 'Sofa bed',
                            'slug'                  => \Str::slug('Sofa bed'),
                            'status'                => '1',
                            'amenities_category_id' => '4'
                        ],
                        [
                            'amenities'             => 'Air conditioning',
                            'slug'                  => \Str::slug('Air conditioning'),
                            'status'                => '1',
                            'amenities_category_id' => '4'
                        ],
                        [
                            'amenities'             => 'Wardrobe or closet',
                            'slug'                  => \Str::slug('Wardrobe or closet'),
                            'status'                => '1',
                            'amenities_category_id' => '4'
                        ],
                        [
                            'amenities'             => 'Carpeted',
                            'slug'                  => \Str::slug('Carpeted'),
                            'status'                => '1',
                            'amenities_category_id' => '4'
                        ],

                    ];

                    Amenities::insert($amenities);
    }
}
