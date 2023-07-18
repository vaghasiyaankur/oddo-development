<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
                    'icon' => 'country/icon/' . Str::slug($country) . '.png',
                    'status' => '1',
                ]
            );

            $sourcePath = public_path('assets/images/seederImages/country/icon/'.Str::slug($country).'.png');
            $destinationPath = public_path('storage/country/icon/'.Str::slug($country).'.png');

            if (File::exists($sourcePath)) {
                if(!File::exists($destinationPath)){
                    File::copy($sourcePath, $destinationPath);
                }
            }
        }
    }
}
