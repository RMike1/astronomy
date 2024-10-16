<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Service;
use App\Models\ServiceSectionHeader;
use App\Models\ContactSectionHeader;
use Illuminate\Database\Seeder;
use Database\Seeders\HeroSectionSeeder;
use Database\Seeders\HomePageSectionSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        // User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            
            $this->call(HeroSectionSeeder::class);
            $this->call(HomePageSectionSeeder::class);
            Service::factory(7)->create();
            ServiceSectionHeader::factory(1)->create();
            ContactSectionHeader::factory(1)->create();
    }
}
