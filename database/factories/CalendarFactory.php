<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calendar>
 */
class CalendarFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $startDates = [now()];
        foreach (range(1, 7) as $key) {
            $startDates[] = now()->addDays($key);
        }

        return [
            'client_id' => random_int(1, 5),
            'invoice_id' => random_int(1, 5),
            'service' => fake()->word(),
            'type' => fake()->randomElement(['overdue', 'due', 'draft', 'partial', 'sent', 'paid', 'others']),
            'title' => fake()->words(3, true),
            'start' => fake()->randomElement($startDates),
            'description' => fake()->realText(),
        ];
    }
}
