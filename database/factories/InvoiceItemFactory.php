<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $rate = fake()->numberBetween(10, 1000);
        $qty = fake()->numberBetween(1, 50);
        $taxRate = fake()->numberBetween(10, 40);
        $total = ($rate * $qty);
        $taxes = [
            [
                'name' => fake()->word(),
                'rate' => $taxRate,
                'number' => fake()->numberBetween(10, 100),
            ],
        ];

        return [
            'invoice_id' => 1,
            'name' => fake()->realText(15),
            'description' => fake()->realText(),
            'rate' => $rate,
            'qty' => $qty,
            'total' => $total,
            'taxes' => json_encode($taxes),
        ];
    }
}
