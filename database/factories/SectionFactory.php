<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sectionable_type' => 'Service',
            'sectionable_id' => 1,
            'title' => fake()->realText(20),
            'description' => fake()->realText(400),
            'image' => picsum(fake()->word(), 300, 200),
        ];
    }
}
