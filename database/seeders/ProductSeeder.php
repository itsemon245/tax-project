<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $products = [
            [
                'title' => fake()->word(),
                'sub_title' => 'Free expert assist included',
                'discount' => 100,
                'is_discount_fixed' => false,
            ],
            [
                'title' => fake()->word(),
                'sub_title' => 'Free expert assist included',
            ],
            [
                'title' => fake()->word(),
                'sub_title' => 'Free expert assist included',
            ],
            [
                'title' => fake()->word(),
                'sub_title' => 'Free expert assist included',
            ],
        ];

        foreach ($products as $product) {
            $catId = 1;
            $subId = ($catId - 1) * 4;
            $prods = Product::factory(1)->create([
                ...$product,
                'product_category_id' => $catId,
            ]);
            foreach ($prods as $key => $prod) {
                $prod->product_sub_category_id = $subId + 1;
                $prod->save();
            }
        }
        foreach ($products as $product) {
            $catId = 2;
            $subId = ($catId - 1) * 4;
            $prods = Product::factory(1)->create([
                ...$product,
                'product_category_id' => $catId,
            ]);
            foreach ($prods as $key => $prod) {
                $prod->product_sub_category_id = ++$subId;
                $prod->save();
            }
        }
        foreach ($products as $product) {
            $catId = 3;
            $subId = ($catId - 1) * 4;
            $prods = Product::factory(1)->create([
                ...$product,
                'product_category_id' => $catId,
            ]);
            foreach ($prods as $key => $prod) {
                $prod->product_sub_category_id = ++$subId;
                $prod->save();
            }
        }
    }
}
