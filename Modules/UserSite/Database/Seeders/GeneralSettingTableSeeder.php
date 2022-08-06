<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\GeneralSetting;

class GeneralSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $model = GeneralSetting::class;

    public function run()
    {
        // Model::unguard();

        GeneralSetting::create([
            'site_name' => 'odda',
            'primary_email' => 'demo@example.com',
            'contact_number' => '9898989898',
            'time_zone' => 'Africa/Accra',
            'currency' => 'USD',
            'currency_symbol' => '$',
        ]);

    }
}
