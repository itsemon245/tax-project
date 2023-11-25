<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomService>
 */
class CustomServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->realText(20),
            'page_name'=> fake()->randomElement(['homepage', 'account']),
            'description'=> fake()->realText(300),
            'link'=> fake()->url(),
        ];
    }
}
