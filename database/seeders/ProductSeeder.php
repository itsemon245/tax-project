<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Free',
                'sub_title' => 'Free expert assist included',
                'discount' => 100,
                'is_discount_fixed' => false
            ],
            [
                'title' => 'Deluxe',
                'sub_title' => 'Free expert assist included'
            ],
            [
                'title' => 'Premium',
                'sub_title' => 'Free expert assist included'
            ],
            [
                'title' => 'Family Bundle',
                'sub_title' => 'Free expert assist included'
            ],
        ];

        $categories = [
            [ //category 1
                [
                    $products
                ],
                [
                    $products
                ],
                [
                    $products
                ],
                [
                    $products
                ],
            ],
            [ //category 2
                [
                    $products
                ],
                [
                    $products
                ],
                [
                    $products
                ],
                [
                    $products
                ],
            ],
        ];
        foreach ($categories as $categoryId => $subCategories) {
            $categoryId++;
            foreach ($subCategories as $subCategoryId => $subCategories) {
                $subCategoryId++;
                foreach ($subCategories as $products) {
                    foreach ($products as $product) {
                        Product::factory(1)->create([
                            ...$product,
                            'product_category_id' => $categoryId,
                            'product_sub_category_id' => $subCategoryId,
                        ]);
                    }
                }
            }
        }
    }
}
