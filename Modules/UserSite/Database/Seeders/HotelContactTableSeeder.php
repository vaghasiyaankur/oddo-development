<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelContact;

class HotelContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    protected $model = HotelContact::class;

    public function run()
    {
        $HotelContact = [
            [
                'name'           => 'nikunjbhai',
                'number'         => '239-380-0336',
                'number_optinal' => '330-749-6894',
                'hotel_id'       => '1',
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'jeminbhai',
                'number'         => '352-488-4751',
                'number_optinal' => '315-373-5026',
                'hotel_id'       => '1',
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'smitbhai',
                'number'         => '228-281-4243',
                'number_optinal' => '206-313-5390',
                'hotel_id'       => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],

        ];

        HotelContact::insert($HotelContact);
    }
}
