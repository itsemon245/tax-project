<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            // 'name' => fake()->name(),
            // 'start_date' => fake()->date(now()),
            // 'end_date' => fake()->date(now()->addDays(10)),
            // 'weekdays' => 5,
            // 'daily_target' => 25,
            // 'weekly_target' =>125,
            // 'monthly_target' => 550,
            // 'total_clients' => 550,
            // 'daily_progress' => 25,
            // 'weekly_progress' => 150,
            // 'monthly_progress	' => 600,
            // 'total_progress' => 600,
        ];
    }
}
