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
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '1',
                            'amenities_category_id' => '1'
                        ],

                        [
                            'amenities'             => 'Toilet paper',
                            'slug'                  => \Str::slug('Toilet paper'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '0',
                            'amenities_category_id' => '1'
                        ],

                        [
                            'amenities'             => 'Bath',
                            'slug'                  => \Str::slug('Bath'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '0',
                            'amenities_category_id' => '1'
                        ],
                        //  Food & drink
                        [
                            'amenities'             => 'Dining area',
                            'slug'                  => \Str::slug('Dining area'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '1',
                            'amenities_category_id' => '2'
                        ],
                        [
                            'amenities'             => 'Dining table',
                            'slug'                  => \Str::slug('Dining table'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '1',
                            'amenities_category_id' => '2'
                        ],
                        [
                            'amenities'             => 'Barbecue',
                            'slug'                  => \Str::slug('Barbecue'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '0',
                            'amenities_category_id' => '2'
                        ],
                        // Media & technology
                        [
                            'amenities'             => 'Computer',
                            'slug'                  => \Str::slug('Computer'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '1',
                            'amenities_category_id' => '3'
                        ],
                        [
                            'amenities'             => 'Game console',
                            'slug'                  => \Str::slug('Game console'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '0',
                            'amenities_category_id' => '3'
                        ],
                        [
                            'amenities'             => 'Laptop',
                            'slug'                  => \Str::slug('Laptop'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '0',
                            'amenities_category_id' => '3'
                        ],
                        // Room amenities
                        [
                            'amenities'             => 'Sofa bed',
                            'slug'                  => \Str::slug('Sofa bed'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '1',
                            'amenities_category_id' => '4'
                        ],
                        [
                            'amenities'             => 'Air conditioning',
                            'slug'                  => \Str::slug('Air conditioning'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '1',
                            'amenities_category_id' => '4'
                        ],
                        [
                            'amenities'             => 'Wardrobe or closet',
                            'slug'                  => \Str::slug('Wardrobe or closet'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '0',
                            'amenities_category_id' => '4'
                        ],
                        [
                            'amenities'             => 'Carpeted',
                            'slug'                  => \Str::slug('Carpeted'),
                            'icon'                  => 'bi-search',
                            'status'                => '1',
                            'featured'              => '0',
                            'amenities_category_id' => '4'
                        ],

                    ];

                    Amenities::insert($amenities);
    }
}
