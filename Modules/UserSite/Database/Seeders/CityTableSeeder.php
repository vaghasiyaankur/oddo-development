<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class CityTableSeeder extends Seeder
{

    protected $model = City::class;

    
    /**
     * Run the database seeds.
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

        foreach ($cities as $index => $city) {
            City::create([
                'name' => $city ,
                'background_image' => 'city/'.\Str::slug($city).'.jpg',
                'country_id' => $index + 1,
                'featured' => 1,
                'status' => 1,
            ]);
        }


        // $this->call("OthersTableSeeder");
    }
}
