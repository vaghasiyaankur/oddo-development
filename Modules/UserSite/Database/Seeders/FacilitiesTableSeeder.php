<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facilities;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Facilities = [
            '24-hour front desk',
            'Bar',
            'Fitness center',
            'Free WiFi',
            'Garden',
            'Restaurant',
            'Room service',
            'Sauna'
        ];

        foreach ($Facilities as $fac) {
            Facilities::create([
                'facilities_name' => $fac,
                'status'       => '1',
            ]);
        }
    }
}
