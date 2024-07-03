<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $categories = [
            [
                'name' => 'Standard Package (tax)',
                'description' => fake()->realText(200),
            ],
            [
                'name' => 'Tax Packages',
                'description' => fake()->realText(200),
            ],
            [
                'name' => 'Vat Packages',
                'description' => fake()->realText(200),
            ],
        ];
        foreach ($categories as $category) {
            $cat = ProductCategory::create([
                'name' => $category['name'],
                'description' => $category['description'],
            ]);
            $sub = ProductSubCategory::factory(4)->create([
                'product_category_id' => $cat->id,
            ]);
        }
    }
}
