<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;

class PartnerTableSeeder extends Seeder
{

    protected $model = City::class;

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = [
            'Sheraton',
            'Marriott',
            'Four Season',
            'The Ritz-Carlton',
            'Hilton',
            'Failmont',
            'Swissotel',
            'The Peninsula',
        ];

        foreach ($partners as $index => $partner) {
            Partner::create([
                'name' => $partner ,
                'logo' => 'partner/'.\Str::slug($partner).'.png',
                'featured' => 1,
                // 'hotel_id' => 1,
            ]);
        }


        // $this->call("OthersTableSeeder");
    }
}
