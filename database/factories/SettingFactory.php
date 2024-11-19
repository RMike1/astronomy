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
            'meta_title'=>fake()->name(),
            'meta_keyword'=>fake()->sentence(),
            'meta_image'=>fake()->imageUrl(),
            'meta_description'=>fake()->paragraph(3),
        ]; 
    }
}
