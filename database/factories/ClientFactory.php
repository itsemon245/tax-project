<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

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
            "name" => fake()->name(),
            "nid" => random_int(100000000, 9999999999999),
            "dob" => fake()->date(),
            "phone" => fake()->phoneNumber(),
            "taxpayer_status" => "ok",
            "father_name" => fake()->name('male'),
            "mother_name" => fake()->name('female'),
            "company_name" => fake()->company(),
            "nature_of_business" => "random",
            "spouse_name" => fake()->name(),
            "spouse_tin" => random_int(100000, 999999999),
            "zone" => fake()->word(),
            "ref_no" => fake()->word(),
            "circle" => fake()->word(),
            "tin" => random_int(100000, 999999999),
            "special_benefits" => "random benefit",
            "permanent_address" => fake()->address(),
            "present_address" => fake()->address()
        ];
    }
}
