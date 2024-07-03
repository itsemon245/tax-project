<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $names = [
            'Tax Services',
            'Vat Services',
            'Misc. Services',
        ];
        foreach ($names as $name) {
            ServiceCategory::create([
                'name' => $name,
            ]);
        }
    }
}
