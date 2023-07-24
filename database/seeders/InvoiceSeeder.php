<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rate = fake()->numberBetween(10, 1000);
        $qty = fake()->numberBetween(1, 50);
        $taxRate = fake()->numberBetween(10, 40);
        $total = ($rate * $qty);
        $discount = fake()->numberBetween(10, 100);
        $subTotal = $total + $total * ($taxRate / 100);
        $taxes = [
            [
                'name' => fake()->word(),
                'rate' => $taxRate,
                'number' => fake()->numberBetween(10, 100),
            ]
        ];
        foreach (range(1, 10) as $key) {
            Invoice::factory(1)->create([
                'discount' => $discount,
                'sub_total' => $subTotal,
                'total' => $subTotal - $discount,
            ]);
            InvoiceItem::factory(1)->create([
                'invoice_id' => $key,
                'rate' => $rate,
                'qty' => $qty,
                'total' => $total,
                'taxes' => json_encode($taxes),
            ]);
        }
    }
}
