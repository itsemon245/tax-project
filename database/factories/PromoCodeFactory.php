<?php

namespace Database\Factories;

use Faker\Provider\zh_TW\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PromoCode>
 */
class PromoCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $promoCode = fake()->countryCode();
        return [
            'code' => $promoCode,

        ];
    }
}
