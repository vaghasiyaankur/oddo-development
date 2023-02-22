<?php

namespace Modules\UserSite\Database\Seeders;

use App\Models\BedType;
use Illuminate\Database\Seeder;

class BedTypeTableSeeder extends Seeder
{
    /**
     * Run the BedType table seed.
     *
     * @return void
     */
    public function run()
    {

        $bedTypes = [
            ['twin', '96.5-188 cm wide'],
            ['Queen', '153-203 cm wide'],
            ['King', '183-203 cm wide'],
        ];

        foreach ($bedTypes as list($bed_type, $bed_size)) {
            BedType::create(
                [
                    'bed_type' => $bed_type,
                    'bed_size' => $bed_size,
                    'status' => '1',
                ]
            );
        }
    }
}
