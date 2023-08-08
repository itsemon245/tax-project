<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userName = fake()->userName();
        $name = fake()->name();
        $arr = explode(' ', $name);
        if (count($arr) > 1) {
            $seed = $arr[0][0] . $arr[1][0];
        } else {
            $seed = $name;
        }
        return [
            'name' => $name,
            'user_name' => $userName,
            'image_url' => "https://api.dicebear.com/6.x/initials/svg?seed=$seed&backgroundType=gradientLinear&backgroundRotation=0,360",
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'remember_token' => Str::random(10),
            'refer_link' => route('refer.link', $userName),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
