<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class CountryTableSeeder extends Seeder
{

    protected $model = Country::class;

    
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

        foreach ($countries as $country) {
            Country::create([
                'country_name' => $country,
                'icon'         => 'country/icon/'.\Str::slug($country).'.png',
                'status'       => '1',
            ]);
        }
    }
}
