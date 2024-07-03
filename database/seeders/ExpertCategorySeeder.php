<?php

namespace Database\Seeders;

use App\Models\ExpertCategory;
use Illuminate\Database\Seeder;

class ExpertCategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        ExpertCategory::factory(1)->create([
            'name' => 'Business',
        ]);
        ExpertCategory::factory(1)->create([
            'name' => 'Individual',
        ]);
        ExpertCategory::factory(1)->create([
            'name' => 'Company',
        ]);
    }
}
