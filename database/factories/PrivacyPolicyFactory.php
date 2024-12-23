<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrivacyPolicy>
 */
class PrivacyPolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(),
            'sub_title'=>fake()->sentence(),
            'background_image'=>fake()->url(),
            'description'=>fake()->paragraph(6),
            'meta_title'=>fake()->name(),
            'meta_keyword'=>fake()->name(),
            'meta_description'=>fake()->paragraph(2),
            'meta_image'=>fake()->imageUrl(),
        ];
    }
}
