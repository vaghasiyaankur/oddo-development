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

        $Facilities = [
            '24-hour front desk',
            'Bar',
            'Fitness center',
            'Free WiFi',
            'Garden',
            'Restaurant',
            'Room service',
            'Sauna'
        ];

        $color = ['#6A78C7','#219653', '#6FCF97', '#9B51E0', '#2d9cdb', '#f2994a'];

        foreach ($Facilities as $key => $fac) {
            Facilities::create([
                'facilities_name' => $fac,
                'icon' => 'bi-search',
                'color' => $color[array_rand($color)],
                'description' => $faker->text,
                'status' => '1',
            ]);
        }
    }
}
