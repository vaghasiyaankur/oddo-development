<?php

namespace Modules\UserSite\Database\Seeders;

use File;
use Illuminate\Database\Seeder;

class LogoFaviconTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\LogoFavicon::create(
            [
                'default_logo' => 'logo/white_background.png',
                'default_favicon' => 'logo/favicon.png',
            ]
        );

        $check_folder = is_dir(public_path('storage/logo'));
        if (!$check_folder) {
            mkdir(public_path('storage/logo'));
        }

        File::copy(public_path('assets/images/white_background.png'), public_path('storage/logo/white_background.png'));
        File::copy(public_path('assets/images/favicon.png'), public_path('storage/logo/favicon.png'));
    }
}
