<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Storage;
use File;

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
            ['Hotel', 'Accommodation for travellers often offering restaurants, meeting rooms and other guest services', 'Property/hotel.jpg'],
            ['Guest house', 'Private home with separate living facilities for host and guest', 'Property/guestHouse.jpg'],
            ['Homestay', 'A shared home where the guest has a private room and the host lives and is on site.', 'Property/homestay.jpg'],
            ['Hostel', 'Budget accommodation with mostly dorm-style bedding and a social atmosphere', 'Property/hostel.jpg'],
            ['Farm stay', 'Private farm with simple accommodation', 'Property/farmStay.jpg'],
        ];

        File::copy(public_path('storage/images/hotel.jpg'), public_path('storage/Property/hotel.jpg'));
        File::copy(public_path('storage/images/guestHouse.jpg'), public_path('storage/Property/guestHouse.jpg'));
        File::copy(public_path('storage/images/homestay.jpg'), public_path('storage/Property/homestay.jpg'));
        File::copy(public_path('storage/images/hostel.jpg'), public_path('storage/Property/hostel.jpg'));
        File::copy(public_path('storage/images/farmStay.jpg'), public_path('storage/Property/farmStay.jpg'));

        foreach ($propertyTypes as  list($name, $description, $image)) {
            PropertyType::create([
                'type' => $name,
                'description' => $description,
                'status' => 1,
                'image' => $image
            ]);
        }
    }
}
