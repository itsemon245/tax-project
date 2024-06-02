<?php

namespace Database\Seeders;

use App\Models\AppointmentTime;
use Illuminate\Database\Seeder;

class AppointmentTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 6; $i++) {
            AppointmentTime::create([
                'user_id' => 1,
                'time' => fake()->time('H:i'),
            ]);
        }
    }
}
