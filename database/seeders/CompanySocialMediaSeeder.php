<?php

namespace Database\Seeders;

use App\Enums\SocialMediaType;
use Illuminate\Database\Seeder;
use App\Models\CompanySocialMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (SocialMediaType::cases() as $platform) {
            CompanySocialMedia::create([
                'platform' => $platform->value,
                'url' => null, 
                'is_active' => true,
            ]);
        }
    }
}
