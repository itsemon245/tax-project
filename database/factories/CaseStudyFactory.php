<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaseStudy>
 */
class CaseStudyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->realText(15);
        return [
            'case_study_package_id' => 1,
            'name' => $name,
            'image' => picsum($name),
            'intro' => fake()->realText(),
            'description' => fake()->realText(400),
            'likes' => 0,
            'downloads' => 0,
            'price' => 0,
            'download_link' => 1,
        ];
    }
}
