<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;

class HotelContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $HotelContacts = [
            ['nikunjbhai', '239-380-0336', '330-749-6894', '1'],
            ['jeminbhai', '352-488-4751', '315-373-5026', '1'],
            ['smitbhai', '228-281-4243', '206-313-5390', '2'],
        ];

        foreach ($HotelContacts as list($name, $number, $number_optinal, $hotel_id)) {
            \App\Models\HotelContact::create(
                [
                    'name' => $name,
                    'number' => $number,
                    'number_optinal' => $number_optinal,
                    'hotel_id' => $hotel_id,
                ]
            );
        }
    }
}
