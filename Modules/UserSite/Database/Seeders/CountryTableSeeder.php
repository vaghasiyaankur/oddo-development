<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            'USA',
            'Italy',
            'Japan',
            'Maxico',
            'Spain',
            'Thailand',
        ];

        $check_folder = is_dir(public_path('storage/country'));
        if (!$check_folder) {
            mkdir(public_path('storage/country'));
        }

        $icon = is_dir(public_path('storage/country/icon'));
        if (!$icon) {
            mkdir(public_path('storage/country/icon'));
        }

        foreach ($countries as $country) {
            \App\Models\Country::create(
                [
                    'country_name' => $country,
                    'icon' => 'country/icon/' . \Str::slug($country) . '.png',
                    'status' => '1',
                ]
            );
        }
    }
}
