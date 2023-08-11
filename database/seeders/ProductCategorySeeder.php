<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "name"=> "Standard Package (tax)",
                "description" => fake()->realText(200),
            ], 
            [
                "name"=> "Tax Packages",
                "description" => fake()->realText(200),
            ], 
        ];
        foreach ($categories as $category) {
            ProductCategory::create([
                'name' => $category['name'],
                'description' => $category['description']
            ]);
        }
    }
}
