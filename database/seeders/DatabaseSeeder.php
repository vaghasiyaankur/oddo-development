<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\UserTableSeeder;
use Modules\UserSite\Database\Seeders\CountryTableSeeder;
use Modules\UserSite\Database\Seeders\CityTableSeeder;
use Modules\UserSite\Database\Seeders\PartnerTableSeeder;
use Modules\UserSite\Database\Seeders\AmenitiesCategoryTableSeeder;
use Modules\UserSite\Database\Seeders\FoodTypeTableSeeder;
use Modules\UserSite\Database\Seeders\AmenitiesTableSeeder;
use Modules\UserSite\Database\Seeders\PropertyTableSeeder;
use Modules\UserSite\Database\Seeders\FacilitiesTableSeeder;
use Modules\UserSite\Database\Seeders\RoomTypeTableSeeder;
use Modules\UserSite\Database\Seeders\RoomListTableSeeder;
use Modules\UserSite\Database\Seeders\BedTypeTableSeeder;
use Modules\UserSite\Database\Seeders\BathroomItemTableSeeder;
use Modules\UserSite\Database\Seeders\HotelTableSeeder;
use Modules\UserSite\Database\Seeders\HotelContactTableSeeder;
use Modules\UserSite\Database\Seeders\HotelRoomTableSeeder;
use Modules\UserSite\Database\Seeders\HotelPhotoTableSeeder;
use Modules\UserSite\Database\Seeders\LogoFaviconTableSeeder;
use Modules\UserSite\Database\Seeders\GeneralSettingTableSeeder;
use Modules\UserSite\Database\Seeders\EmailSettingTableSeeder;
use Modules\UserSite\Database\Seeders\MailTemplateTableSeeder;
use Modules\UserSite\Database\Seeders\ShortCodeMailTemplateTableSeeder;
use Modules\UserSite\Database\Seeders\PaymentTableSeeder;

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
            UserTableSeeder::class,
            CountryTableSeeder::class,
            CityTableSeeder::class,
            PartnerTableSeeder::class,
            AmenitiesCategoryTableSeeder::class,
            AmenitiesTableSeeder::class,
            FoodTypeTableSeeder::class,
            PropertyTableSeeder::class,
            FacilitiesTableSeeder::class,
            RoomTypeTableSeeder::class,
            RoomListTableSeeder::class,
            BedTypeTableSeeder::class,
            BathroomItemTableSeeder::class,
            HotelTableSeeder::class,
            HotelContactTableSeeder::class,
            HotelRoomTableSeeder::class,
            HotelPhotoTableSeeder::class,
            LogoFaviconTableSeeder::class,
            GeneralSettingTableSeeder::class,
            EmailSettingTableSeeder::class,
            MailTemplateTableSeeder::class,
            ShortCodeMailTemplateTableSeeder::class,
            PaymentTableSeeder::class,
        ]);
    }
}
