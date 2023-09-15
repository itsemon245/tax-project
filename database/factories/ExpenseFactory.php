<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(['credit', 'debit']);
        $amount = random_int(10, 1000);
        $balance = $type === 'credit' ? $amount : $amount * (-1);
        return [
            'date' => fake()->date(),
            // 'spend_on' => fake()->realText(20),
            'category' => fake()->realText(20),
            'merchant' => fake()->realText(20),
            'type' => $type,
            'balance' => $balance,
            'amount' => $amount,
            'items' => [
                'amount' => random_int(10, 1000),
                'description' => fake()->realText(200)
            ],
        ];
    }
}
