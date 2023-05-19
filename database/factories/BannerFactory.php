<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->realText(50);
        $button = env('APP_URL') . fake()->word(1);
        $seed = fake()->word(1);
        return [
            'title' => $title,
            'sub_title' => $title,
            'button' => $button,
            'image_url' => "https://picsum.photos/seed/$seed/1080/350"
        ];
    }
}
