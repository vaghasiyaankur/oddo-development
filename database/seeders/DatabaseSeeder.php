<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Modules\UserSite\Database\Seeders\CountrySeederTableSeeder;
use Modules\UserSite\Database\Seeders\AmenitiesCategoryTableSeeder;
use Modules\UserSite\Database\Seeders\FoodTypeTableSeeder;
use Modules\UserSite\Database\Seeders\AmenitiesTableSeeder;
use Modules\UserSite\Database\Seeders\PropertyTableSeeder;
use Modules\UserSite\Database\Seeders\FacilitiesTableSeeder;
use Modules\UserSite\Database\Seeders\RoomTypeTableSeeder;
use Modules\UserSite\Database\Seeders\RoomListTableSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeederTableSeeder::class,
            AmenitiesCategoryTableSeeder::class,
            AmenitiesTableSeeder::class,
            FoodTypeTableSeeder::class,
            PropertyTableSeeder::class,
            FacilitiesTableSeeder::class,
            RoomTypeTableSeeder::class,
            RoomListTableSeeder::class,
        ]);
    }
}
