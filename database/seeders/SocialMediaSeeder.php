<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\SocialMediaType;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (SocialMediaType::cases() as $platform) {
            SocialMedia::create([
                'platform' => $platform->value,
                'url' => null, 
                'is_active' => true,
                'team_id'=>1,
            ]);
        }
    }
}
