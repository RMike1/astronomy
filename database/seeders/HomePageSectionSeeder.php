<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('home_page_sections')->insert([
            [

            'title' => 'Lorem Ipsum 1',
            'sub_title' => 'Lorem Ipsum 1',
            'slug' => 'lorem-ipsum-1',
            'is_active' => 1,
            'text_position'=>'left',
            'summary_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit-1',
            'full_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua-1',
            'image' => 'user/images/bc/image1.jpg',
        ],
            [
                'title' => 'Lorem Ipsum 2',
                'sub_title' => 'Lorem Ipsum 2',
                'slug' => 'lorem-ipsum-2',
                'is_active' => 1,
                'text_position'=>'right',
                'summary_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit-2',
                'full_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua-2',
                'image' => 'user/images/bc/image2.jpg',
            ],
            [
                'title' => 'Lorem Ipsum 3',
                'sub_title' => 'Lorem Ipsum 3',
                'slug' => 'lorem-ipsum-3',
                'is_active' => 1,
                'text_position'=>'left',
                'summary_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit-3',
                'full_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua-3',
                'image' => 'user/images/bc/image3.jpg',
            ],
            [
                'title' => 'Lorem Ipsum 4',
                'sub_title' => 'Lorem Ipsum 4',
                'slug' => 'lorem-ipsum-4',
                'is_active' => 0,
                'text_position'=>'right',
                'summary_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit-4',
                'full_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua-4',
                'image' => 'user/images/bc/image4.jpg',
            ],
            [
                'title' => 'Lorem Ipsum 5',
                'sub_title' => 'Lorem Ipsum 5',
                'slug' => 'lorem-ipsum-5',
                'is_active' => 1,
                'text_position'=>'left',
                'summary_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit-5',
                'full_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua-5',
                'image' => 'user/images/bc/image5.jpg',
            ],
            ]
        );
    }
}
