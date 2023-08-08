<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $text = fake()->realText(15);
        $description = fake()->realText(300);
        $seed = str($text)->slug();
        return [
            'title' => $text,
            'author' => fake()->name(),
            'description' => $description,
            'sample_pdf' => $text,
            'pdf' => $text,
            'thumbnail' => picsum($seed),
            'price' => fake()->randomFloat(2, 10, 1000),
        ];
    }
}
