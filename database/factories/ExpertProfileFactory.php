<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExpertProfile>
 */
class ExpertProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        return [
            'name' => $name,
            'post' => fake()->jobTitle(),
            'bio' => fake()->realText(50),
            'image' => picsum($name),
            'experience' => fake()->randomNumber(2),
            'join_date' => fake()->date(),
            'availability' => "09:00 am to 05:00pm (Monday to Thursday)",
            'at_a_glance' => fake()->realText(100),
            'description' => fake()->realText(300),
            'district' => fake()->realText(10),
            'thana' => fake()->realText(10),
        ];
    }
}
