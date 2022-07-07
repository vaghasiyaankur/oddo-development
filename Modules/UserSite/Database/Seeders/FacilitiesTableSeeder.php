<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facilities;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $facilities = [
            ['24-hour front desk', '#6A78C7'],
            ['Bar', '#219653'],
            ['Fitness center', '#6FCF97'],
            ['Free WiFi', '#9B51E0'],
            ['Garden', '#2d9cdb'],
            ['Restaurant', '#f2994a'],
            ['Room service', '#ade1fb'],
            ['Sauna', '#7fa1c0'],
        ];

        foreach ($facilities as  list($name, $color)) {
            Facilities::create([
                'facilities_name' => $name,
                'icon' => 'bi-search',
                'color' => $color,
                'description' => $faker->text,
                'status' => '1',
            ]);
        }
    }
}
