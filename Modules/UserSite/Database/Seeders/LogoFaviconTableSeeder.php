<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\LogoFavicon;
use Illuminate\Support\Facades\Storage;
use File;

class LogoFaviconTableSeeder extends Seeder
{

    protected $model = LogoFavicon::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LogoFavicon::create([
            'default_logo' => 'logo/white_background.png',
            'default_favicon' => 'logo/favicon.png',
        ]);

        File::copy(public_path('storage/images/white_background.png'), public_path('storage/logo/white_background.png'));
        File::copy(public_path('storage/images/favicon.png'), public_path('storage/logo/favicon.png'));
    }
}
