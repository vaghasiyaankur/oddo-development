<?php
namespace Modules\UserSite\Database\Seeders;

use App\Models\Amenities;
use Illuminate\Database\Seeder;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the Amenity seed.
     *
     * @return void
     */
    public function run()
    {

        $Amenities = array();
        $Amenities[1][1] = "Bidet";
        $Amenities[1][2] = "Toilet paper";
        $Amenities[1][3] = "Bath";
        $Amenities[2][1] = "Dining area";
        $Amenities[2][2] = "Dining table";
        $Amenities[2][3] = "Barbecue";
        $Amenities[3][1] = "Computer";
        $Amenities[3][2] = "Game console";
        $Amenities[3][3] = "Laptop";
        $Amenities[4][1] = "Sofa bed";
        $Amenities[4][2] = "Air conditioning";
        $Amenities[4][3] = "Wardrobe or closet";
        $Amenities[4][4] = "Carpeted";

        $check_folder = is_dir(public_path('storage/amenities'));
        if (!$check_folder) {
            mkdir(public_path('storage/amenities'));
        }

        foreach ($Amenities as $key => $amenity) {
            foreach ($amenity as $v2) {
                Amenities::create(
                    [
                        'amenities' => $v2,
                        'icon' => 'bi-search',
                        'status' => '1',
                        'featured' => rand(0, 1),
                        'amenities_category_id' => $key,
                    ]
                );
            }
        }
    }
}
