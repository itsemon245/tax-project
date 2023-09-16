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
        $experts = ExpertProfile::factory(10)->create();
        foreach ($experts as $expert) {
            $expert->expertCategories()->attach(1);
            $expert->expertCategories()->attach(2);
            $expert->expertCategories()->attach(3);
        }
    }
}
