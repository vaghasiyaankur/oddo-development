<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CityTableSeeder extends Seeder
{

    /**
     * Run the City seed.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            'New York',
            'Rome',
            'Tokyo',
            'Guadalajara',
            'Madrid',
            'Bangkok',
        ];

        $check_folder = is_dir(public_path('storage/city'));
        if (!$check_folder) {
            mkdir(public_path('storage/city'));
        }

        foreach ($cities as $index => $city) {
            \App\Models\City::create(
                [
                    'name' => $city,
                    'background_image' => 'city/' . Str::slug($city) . '.webp',
                    'country_id' => $index + 1,
                    'featured' => 1,
                    'status' => 1,
                ]
            );

            $sourcePath = public_path('assets/images/seederImages/city/'.Str::slug($city).'.webp');
            $destinationPath = public_path('storage/city/'.Str::slug($city).'.webp');

            if (File::exists($sourcePath)) {
                if(!File::exists($destinationPath)){
                    File::copy($sourcePath, $destinationPath);
                }
            }
        }
    }
}
