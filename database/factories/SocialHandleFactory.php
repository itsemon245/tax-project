<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialHandle>
 */
class SocialHandleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->realText(15);
        $link = "https://$name.com/";
        return [
            'name' => $name,
            'link' => $link
        ];
    }
}
