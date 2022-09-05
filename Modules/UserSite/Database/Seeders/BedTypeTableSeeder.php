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
            ['twin', '96.5-188 cm wide'],
            ['Queen', '153-203 cm wide'],
            ['King', '183-203 cm wide'],
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
