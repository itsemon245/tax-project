<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = ["Silver", "Gold", "Platinum", 'Exclusive'];
        foreach ($subCategories as $sub) {
            ProductSubCategory::create([
                'name' => $sub,
                'product_category_id' => 1
            ]);
            ProductSubCategory::create([
                'name' => $sub,
                'product_category_id' => 2
            ]);
        }
    }
}
