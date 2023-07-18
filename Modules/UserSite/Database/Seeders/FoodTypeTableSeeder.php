<?php

namespace Modules\UserSite\Database\Seeders;

use App\Models\FoodType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FoodTypeTableSeeder extends Seeder
{
    /**
     * Run the Food Type seed.
     *
     * @return void
     */
    public function run()
    {
        $food_types = [
            'Continental',
            'American',
            'Italian',
            'Vegetarian',
            'Vegan',

        ];

        foreach ($food_types as $food_type) {
            FoodType::create(
                [
                    'food_type' => $food_type,
                    'slug' => Str::slug($food_type),
                    'status' => '1',
                ]
            );
        }
    }
}
