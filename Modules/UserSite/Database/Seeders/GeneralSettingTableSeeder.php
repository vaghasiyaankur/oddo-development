<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;

class GeneralSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        \App\Models\GeneralSetting::create(
            [
                'site_name' => 'odda',
                'primary_email' => 'demo@example.com',
                'contact_number' => '9898989898',
                'time_zone' => 'Africa/Accra',
                'currency' => 'USD',
                'currency_symbol' => '$',
            ]
        );

    }
}
