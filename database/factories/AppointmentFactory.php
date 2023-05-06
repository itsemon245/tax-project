<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seed = fake()->word(1);
        return [
            'title' => fake()->realText(10),
            'sub_title' => fake()->realText(10),
            'tag' => fake()->realText(10),
            'description' => fake()->realText(100),
            'image' => "https://picsum.photos/seed/$seed/350",
        ];
    }
}
