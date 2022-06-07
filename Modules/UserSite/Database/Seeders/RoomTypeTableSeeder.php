<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities_categorys = [
            'Single',
            'Double',
            'Triple',
            'Quadruple',
        ];

        foreach ($amenities_categorys as $category) {
            RoomType::create([
                'room_type' => $category,
                'slug'         => \Str::slug($category),
                'status'       => '1',
            ]);
        }
    }
}
