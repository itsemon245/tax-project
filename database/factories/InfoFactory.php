<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Info>
 */
class InfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seed = fake()->word(1);
        $sectionId = fake()->randomElement([1, 2]);
        $title = $sectionId === 1 ? 'we help you file quickly and confidently' : 'how income tax filling process works';
        return [
            'title' => $title,
            'description' => fake()->realText(100),
            'image_url' => "https://picsum.photos/seed/$seed/200",
            'section_id' => $sectionId,
        ];
    }
}
