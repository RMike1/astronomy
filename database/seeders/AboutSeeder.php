<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            'about_hero_title'=>'Far away in the universe...',
            'about_hero_sub_title'=>'Our Journey Lorem ipsum',
            'about_hero_video'=>'user/video/about-video.mp4',
            'about_image'=>'user/images/bc/image6.jpg',
            'about_title'=>'Lorem Ipsumm Truw deiir',
            'about_sub_title'=>'About us',
            'about_summary_description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquas',
            'about_description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquas lor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquas',
            'logo'=>'user/images/bc/logo.png',
            'favicon'=>'user/images/bc/image.ico',
        ]);
    }
}
