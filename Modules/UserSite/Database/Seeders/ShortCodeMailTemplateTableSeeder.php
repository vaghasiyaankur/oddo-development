<?php

namespace Modules\UserSite\Database\Seeders;

use App\Models\ShortCodeMailTemplate;
use Illuminate\Database\Seeder;

class ShortCodeMailTemplateTableSeeder extends Seeder
{
    /**
     * Run the ShortCodeMailTemplate seeds.
     *
     * @return void
     */
    public function run()
    {
        $shortCodes = [
            ['{customer_name}', 'Customer Name'],
            ['{website_title}', 'Website Title'],
            ['{booking_id}', 'Booking Id'],
        ];

        foreach ($shortCodes as list($shortCode, $meaning)) {
            \App\Models\ShortCodeMailTemplate::create(
                [
                    'short_code' => $shortCode,
                    'meaning' => $meaning,
                ]
            );
        }
    }
}
