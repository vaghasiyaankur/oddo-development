<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pages;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
                '<p>hello</p>'
            ],
            [
                'Contact Us',
                'contact-us',
                'Page Contact Us',
                'Page, Contact Us',
                '1',
                '1',
                '1',
                '<p>hello</p>'
            ]
        ];

        foreach ($pages as  list($title, $slug, $meta_description, $meta_key, $location, $status, $show_title, $description)) {
            Pages::create([
                'title' => $title,
                'slug' => $slug,
                'meta_description' => $meta_description,
                'meta_key' => $meta_key,
                'location' => $location,
                'status' => $status,
                'show_title' => $show_title,
                'description' => $description,
            ]);
        }
    }
}
