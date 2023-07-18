<?php

namespace Modules\UserSite\Database\Seeders;

use File;
use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $check_folder = is_dir(public_path('storage/Property'));
        if (!$check_folder) {
            mkdir(public_path('storage/Property'));
        }

        $propertyTypes = [
            ['Hotel',
                'Accommodation for travellers often offering restaurants, meeting rooms and other guest services',
                'Property/hotel.webp',
            ],
            ['Guest house',
                'Private home with separate living facilities for host and guest',
                'Property/guestHouse.webp',
            ],
            ['Homestay',
                'A shared home where the guest has a private room and the host lives and is on site.',
                'Property/homestay.webp',
            ],
            ['Hostel',
                'Budget accommodation with mostly dorm-style bedding and a social atmosphere',
                'Property/hostel.webp',
            ],
            ['Farm stay',
                'Private farm with simple accommodation',
                'Property/farmStay.webp',
            ],
        ];

        // File::copy(public_path('assets/images/hotel.webp'), public_path('storage/Property/hotel.webp'));
        // File::copy(public_path('assets/images/guestHouse.webp'), public_path('storage/Property/guestHouse.webp'));
        // File::copy(public_path('assets/images/homestay.webp'), public_path('storage/Property/homestay.webp'));
        // File::copy(public_path('assets/images/hostel.webp'), public_path('storage/Property/hostel.webp'));
        // File::copy(public_path('assets/images/farmStay.webp'), public_path('storage/Property/farmStay.webp'));

        foreach ($propertyTypes as list($name, $description, $image)) {
            \App\Models\PropertyType::create(
                [
                    'type' => $name,
                    'description' => $description,
                    'status' => 1,
                    'image' => $image,
                ]
            );
        }
    }
}
