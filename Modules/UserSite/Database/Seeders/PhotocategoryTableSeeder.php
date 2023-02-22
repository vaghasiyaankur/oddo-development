<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;

class PhotocategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photoCategories = [
            'other',
            'Restaurant',
            'Lobby',
            'Rooms',
            'Amenities',
        ];

        foreach ($photoCategories as $index => $photoCategory) {
            \App\Models\Photocategory::create(
                [
                    'name' => $photoCategory,
                ]
            );
        }
    }
}
