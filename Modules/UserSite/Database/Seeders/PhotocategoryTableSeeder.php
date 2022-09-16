<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\PhotoCategory;

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
            'all',
            'Restaurant',
            'Lobby',
            'Rooms',
            'Amenities',
        ];

        foreach ($photoCategories as $index => $photoCategory) {
            PhotoCategory::create([
                'name' => $photoCategory
            ]);
        }
    }
}