<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class CountrySeederTableSeeder extends Seeder
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
            'India',
            'USA',
            'Germany',
            'Hong Kong'
        ];

        foreach ($countries as $country) {
            Country::create([
                'country_name' => $country,
                'slug'         => \Str::slug($country),
                'status'       => '1',
            ]);
        }


        // $this->call("OthersTableSeeder");
    }
}
