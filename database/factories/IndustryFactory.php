<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Industry>
 */
class IndustryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $text = fake()->realText(15);
        $seed = str($text)->slug();
        $intro = fake()->realText(200);
        $description = fake()->realText(300);
        return [
            'page_description' => $description,
            'title' => $text,
            'image' => picsum($seed),
            'intro' => $intro,
            'description' => $description,
        ];
    }
}
