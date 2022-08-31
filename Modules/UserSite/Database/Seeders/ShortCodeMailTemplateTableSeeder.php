<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShortCodeMailTemplate;

class ShortCodeMailTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shortCodes = [
            ['{customer_name}', 'Customer Name'],
            ['{website_title}', 'Website Title'],
            ['{booking_id}', 'Booking Id']
        ];

        foreach ($shortCodes as  list($shortCode, $meaning)) {
            ShortCodeMailTemplate::create([
                'short_code' => $shortCode,
                'meaning' => $meaning,
            ]);
        }
    }
}
