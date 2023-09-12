<?php

namespace Database\Seeders;

use App\Models\ExpertProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpertProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExpertProfile::factory(500)->create();
    }
}
