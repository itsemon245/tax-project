<?php

namespace Database\Seeders;

use App\Models\ClientStudio;
use Illuminate\Database\Seeder;

class ClientStudioSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $seed = fake()->word();
        ClientStudio::create([
            'description' => fake()->realText(),
            'title' => fake()->realText(10),
            'image' => "https://api.dicebear.com/6.x/adventurer/svg?seed=$seed",
            'count' => fake()->numberBetween(1, 1000),
        ]);
    }
}
