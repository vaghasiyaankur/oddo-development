<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\BathroomItem;

class BathroomItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
            'Spa bath'  
        ];

        foreach ($items as $key => $item) {
            BathroomItem::create([
                'item' => $item,
                'icon' => 'bi-search',
                'status' => '1',
            ]);
        }

    }
}
