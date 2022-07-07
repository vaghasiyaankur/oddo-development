<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\BedType;

class BedTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $bedTypes = [
            ['Single bed', '90-130 cm wide'],
            ['Double bed', '131-150 cm wide'],
            ['Large bed (King size)', '151-180 cm wide'],
            ['Extra-large double bed (Super-king size)', '181-210 cm wide'],
        ];

        foreach ($bedTypes as  list($bed_type, $bed_size)) {
            BedType::create([
                'bed_type' => $bed_type,
                'bed_size' => $bed_size,
                'status' => '1'
            ]);
        }
    }
}
