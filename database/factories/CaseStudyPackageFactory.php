<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaseStudyPage>
 */
class CaseStudyPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->realText(15),
            'price' => random_int(10, 10000),
            'limit' => random_int(1, 30),
            'billing_type' => fake()->randomElement(['monthly', 'yearly', 'onetime']),
            'page_title' => 'Page Title',
            'page_description' => 'Page Description',
            'page_image' => picsum('Page Image'),
        ];
    }
}
