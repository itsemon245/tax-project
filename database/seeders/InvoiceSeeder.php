<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $header_image = 'uploads/invoices/default-invoice-header-image.png';
        $invoice = Invoice::create([
            'client_id' => fake()->numberBetween(1,5),
            'header_image' => $header_image,
            'reference_no' => fake()->randomNumber(4),
            'note' => fake()->realText(),
            'discount' => fake()->numberBetween(10,100),
            'sub_total' => fake()->numberBetween(100,1000),
            'total' => fake()->numberBetween(1000,10000),
            'amount_paid' => fake()->numberBetween(1000,10000),
            'amount_due' => fake()->numberBetween(1000,10000),
            'payment_note' => fake()->realText(),
            'payment_method' => fake()->randomElement(['cash', 'bkash', 'nagad', 'rocket', 'bank', 'card']),
            'payment_date' => now()->addDays(3)->format('Y-m-d'),
            'due_date' => now()->addDays(7)->format('Y-m-d'),
            'issue_date' => now()->format('Y-m-d'),
        ]);
    }
}
