<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\AmenitiesCategory;


class AmenitiesCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities_categorys = [
            'Bathroom',
            'Food & drink',
            'Media & technology',
            'Room amenities'
        ];

        foreach ($amenities_categorys as $category) {
            AmenitiesCategory::create([
                'category' => $category,
                'slug'         => \Str::slug($category),
                'status'       => '1',
            ]);
        }

        // $this->call("OthersTableSeeder");
    }
}
