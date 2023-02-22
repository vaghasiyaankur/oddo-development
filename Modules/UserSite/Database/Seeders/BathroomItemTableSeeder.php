<?php
namespace Modules\UserSite\Database\Seeders;

use App\Models\BathroomItem;
use Illuminate\Database\Seeder;

class BathroomItemTableSeeder extends Seeder
{
    /**
     * Run the Bathroom Item seed.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'Toilet paper',
            'Shower',
            'Toilet',
            'Bath',
            'Free toiletries',
            'Hairdryer',
            'Bidet',
            'Slippers',
            'Bathrobe',
            'Spa bath',
        ];

        $check_folder = is_dir(public_path('storage/bathroomItem'));
        if (!$check_folder) {
            mkdir(public_path('storage/bathroomItem'));
        }

        foreach ($items as $key => $item) {
            BathroomItem::create(
                [
                    'item' => $item,
                    'icon' => 'bi-search',
                    'status' => '1',
                ]
            );
        }

    }
}
