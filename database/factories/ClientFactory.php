<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'father_name' => fake()->name(),
            'mother_name' => fake()->name(),
            'spouse_name' => fake()->name(),
            'company_name' => fake()->word(),
            'present_address' => fake()->address(),
            'permanent_address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'tin' => fake()->numberBetween(1000, 100000),
            'circle' => 'circle',
            'zone' => 'zone',
        ];
    }
}
