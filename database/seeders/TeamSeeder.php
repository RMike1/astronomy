<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            [
                'first_name'=>'John',
                'last_name'=>'Doe',
                'email'=>'johndoe@gmail.com',
                'image'=>'user/images/team-05.png',
                'position'=>'astronaut',
            ],
            [
                'first_name'=>'Peter',
                'last_name'=>'Eric',
                'email'=>'eric@gmail.com',
                'image'=>'user/images/team-04.png',
                'position'=>'developer',
            ],
            [
                'first_name'=>'Danny',
                'last_name'=>'Kob',
                'email'=>'danny@gmail.com',
                'image'=>'user/images/team-03.png',
                'position'=>'astronaut',
            ],
            [
                'first_name'=>'Lorenzo',
                'last_name'=>'marquese',
                'email'=>'jack@gmail.com',
                'image'=>'user/images/team-01.png',
                'position'=>'astronaut',
            ],

        ]);
    }
}
