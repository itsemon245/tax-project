<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $page_cards = [
            [
                'title' => fake()->realText(25),
                'description' => fake()->realText(200)
            ],
            [
                'title' => fake()->realText(25),
                'description' => fake()->realText(200)
            ],
        ];
        $page_learn_more = [
            'description' => fake()->realText(100),
            'images' => [
                picsum(fake()->word()),
                picsum(fake()->word()),
                picsum(fake()->word()),
            ]
        ];
        $page_topics = [
            'description' => fake()->realText(100),
            'lists' => [
                fake()->realText(350),
                fake()->realText(350),
                fake()->realText(350),
            ]
        ];
        return [
            'name' => fake()->realText(15),
            'price' => fake()->randomFloat(2, 10, 1000),
            'description' => fake()->realText(300),
            'preview' => fake()->url(),
            'includes' => fake()->realText(300),
            'graduates_receive' => fake()->realText(300),
            'page_title' => fake()->realText(25),
            'page_banner' => picsum(fake()->word()),
            'page_cards' => $page_cards,
            'page_learn_more' => $page_learn_more,
            'page_topics' => $page_topics,
        ];
    }
}
