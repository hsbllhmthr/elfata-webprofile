<?php

namespace Database\Seeders;

use App\Models\Admin\Submenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create data
        Submenu::insert([
            [
                'language_id' => 1,
                'menu_id' => 1,
                'menu_name' => 'Home',
                'submenu_name' => 'Home Version 01',
                'uri' => '/',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 1,
                'menu_name' => 'Home',
                'submenu_name' => 'Home Version 02',
                'uri' => 'index-2',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 1,
                'menu_name' => 'Home',
                'submenu_name' => 'Home Version 03',
                'uri' => 'index-3',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 3,
                'menu_name' => 'Pages',
                'submenu_name' => 'Faqs',
                'uri' => 'faqs',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 3,
                'menu_name' => 'Pages',
                'submenu_name' => 'Gallery',
                'uri' => 'gallery',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 3,
                'menu_name' => 'Pages',
                'submenu_name' => 'Teams',
                'uri' => 'teams',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 3,
                'menu_name' => 'Pages',
                'submenu_name' => 'Services',
                'uri' => 'services',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 3,
                'menu_name' => 'Pages',
                'submenu_name' => 'Portfolio',
                'uri' => 'portfolios',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 3,
                'menu_name' => 'Pages',
                'submenu_name' => 'Plans',
                'uri' => 'plans',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 3,
                'menu_name' => 'Pages',
                'submenu_name' => 'Career',
                'uri' => 'careers',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ],
            [
                'language_id' => 1,
                'menu_id' => 4,
                'menu_name' => 'News',
                'submenu_name' => 'Blogs',
                'uri' => 'blogs',
                'url' => null,
                'view' => 0,
                'status' => 'published',
                'order' => 0,
            ]
        ]);
    }
}
