<?php
namespace Modules\UserSite\Database\Seeders;

use App\Models\AmenitiesCategory;
use Illuminate\Database\Seeder;

class AmenitiesCategoryTableSeeder extends Seeder
{
    /**
     * Run the Amenities Category seed.
     *
     * @return void
     */
    public function run()
    {
        $amenities_categorys = [
            'Bathroom',
            'Food & drink',
            'Media & technology',
            'Room amenities',
        ];

        foreach ($amenities_categorys as $category) {
            AmenitiesCategory::create([
                'category' => $category,
                'slug' => \Str::slug($category),
                'status' => '1',
            ]);
        }
    }
}
