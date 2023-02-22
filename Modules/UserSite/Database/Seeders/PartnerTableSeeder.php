<?php

namespace Modules\UserSite\Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the Partner seeds.
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

        $check_folder = is_dir(public_path('storage/partner'));
        if (!$check_folder) {
            mkdir(public_path('storage/partner'));
        }

        foreach ($partners as $index => $partner) {
            \App\Models\Partner::create(
                [
                    'name' => $partner,
                    'logo' => 'partner/' . \Str::slug($partner) . '.png',
                    'featured' => 1,
                    // 'hotel_id' => 1,
                ]
            );
        }
    }
}
