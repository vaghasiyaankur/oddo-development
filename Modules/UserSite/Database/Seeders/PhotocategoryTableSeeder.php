<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photocategory;

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
            Photocategory::create([
                'name' => $photoCategory
            ]);
        }
    }
}
