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

        $subCategories = [1, 3, 5, 7];

        foreach ($products as $product) {
            foreach ($subCategories as $subId) {
                Product::factory(1)->create([
                    ...$product,
                    'product_category_id' => 1,
                    'product_sub_category_id' => $subId,
                ]);
            }
        }
        foreach ($products as $product) {
            foreach ($subCategories as $subId) {
                Product::factory(1)->create([
                    ...$product,
                    'product_category_id' => 2,
                    'product_sub_category_id' => $subId,
                ]);
            }
        }
    }
}
