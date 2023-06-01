<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Service 1',
            'Service 2',
            'Service 3',
            'Service 4',
        ];
        foreach ($names as $name) {
            ServiceCategory::create([
                'name'=> $name
            ]);
        }
    }
}
