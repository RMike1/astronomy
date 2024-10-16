<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hero_sections')->insert([
            'title'=>'Exploring the Milky Way',
            'description' => 'Journey through our home galaxy, the Milky Way, and explore its billions of stars and planets.',
            'video' => 'user/video/hero-video.mp4'
        ]);
    }
}
