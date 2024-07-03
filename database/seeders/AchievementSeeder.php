<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Achievement::factory(15)->create();
    }
}
