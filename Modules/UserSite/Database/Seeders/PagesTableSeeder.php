<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the Pages seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'About Us',
                'about-us',
                'Page About Us',
                'Page, About Us',
                '1',
                '1',
                '1',
                '<p> Oddo is a global platform that empowers entrepreneurs and small businesses with hotels and homes by providing full stack technology that increases earnings and eases operations. Bringing affordable and trusted accommodation that guests can book instantly.</p>',
            ],
        ];

        foreach ($pages as list($title, $slug, $meta_description, $meta_key, $location, $status, $show_title, $description)) {
            \App\Models\Pages::create(
                [
                    'title' => $title,
                    'slug' => $slug,
                    'meta_description' => $meta_description,
                    'meta_key' => $meta_key,
                    'location' => $location,
                    'status' => $status,
                    'show_title' => $show_title,
                    'description' => $description,
                ]
            );
        }
    }
}
