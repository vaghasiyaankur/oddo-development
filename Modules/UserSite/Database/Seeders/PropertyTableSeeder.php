<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyType;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $propertyTypes = [
            ['Hotel', 'Accommodation for travellers often offering restaurants, meeting rooms and other guest services'],
            ['Guest house', 'Private home with separate living facilities for host and guest'],
            ['Homestay', 'A shared home where the guest has a private room and the host lives and is on site. '],
            ['Hostel', 'Budget accommodation with mostly dorm-style bedding and a social atmosphere'],
            ['Farm stay', 'Private farm with simple accommodation'],
        ];

        foreach ($propertyTypes as  list($name, $description)) {
            PropertyType::create([
                'type' => $name,
                'description' => $description
            ]);
        }
    }
}
