<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodType;

class FoodTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
            FoodType::create([
                'food_type' => $food_type,
                'slug'         => \Str::slug($food_type),
                'status'       => '1',
            ]);
        }


        // $this->call("OthersTableSeeder");
    }
}
