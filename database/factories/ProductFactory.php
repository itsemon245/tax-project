<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $packageFeat = '[
            {
                "color": "#1abc9c",
                "package_feature": "Feature 1"
            },
            {
                "color": "#f1556c",
                "package_feature": "Feature 2"
            },
            {
                "color": "#1abc9c",
                "package_feature": "Feature 3"
            }
        ]';
        return [
            "product_category_id" => fake()->numberBetween(1, 2),
            "user_id" => 1,
            "title" => fake()->realText(15),
            "sub_title" => fake()->realText(15),
            "price" => fake()->numberBetween(100, 1500),
            "discount" => fake()->numberBetween(1, 40),
            "is_discount_fixed" => fake()->randomElement([true, false]),
            "is_most_popular" => fake()->randomElement([true, false]),
            "type" => fake()->randomElement(['Silver', 'Gold', 'Platinum', 'Exclusive']),
            "package_features" => $packageFeat,
            "description" => fake()->realText(50),
            "status" => fake()->randomElement([true, false]),
        ];
    }
}
