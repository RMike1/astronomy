<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'meta_keyword'=>fake()->sentence(),
            'meta_title'=>fake()->sentence(),
            'meta_description'=>fake()->paragraph(3),
            'company_name'=>fake()->name(),
            'logo'=>fake()->imageUrl(),
            'favicon'=>fake()->imageUrl(),
        ];
    }
}
