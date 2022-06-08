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
        



      
        $BedType = [
            [
                'bed_type'   => 'Single bed',
                'bed_size'   => '90-130 cm wide',
                'status'     => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'bed_type'   => ' Double bed',
                'bed_size'   => '131-150 cm wide',
                'status'     => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'bed_type'   => 'Large bed (King size)',
                'bed_size'   => '151-180 cm wide',
                'status'     => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'bed_type'   => 'Extra-large double bed (Super-king size)',
                'bed_size'   => '181-210 cm wide',
                'status'     => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        BedType::insert($BedType);
    }
}
