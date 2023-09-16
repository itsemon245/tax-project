<?php

namespace Database\Seeders;

use App\Models\FiscalYear;
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
        $total = $subTotal - $discount;
        $paid = fake()->numberBetween(0, $total);
        $due = $total - $paid;
        $taxes = [
            [
                'name' => fake()->word(),
                'rate' => $taxRate,
                'number' => fake()->numberBetween(10, 100),
            ]
        ];
        $fiscalYear = FiscalYear::create(['year' => currentFiscalYear()]);
        $fiscalYear2 = FiscalYear::create(['year' => currentYear() - 2 . '-' . currentYear() - 1]);
        foreach (range(1, 10) as $key) {
            $invoice = Invoice::factory(1)->create();

            $invoice[0]->fiscalYears()->attach($fiscalYear->id, [
                'discount' => $discount,
                'sub_total' => $subTotal,
                'demand' => $total,
                'paid' => $paid,
                'due' => $due,
                'status' => $due == 0 ? 'paid' : fake()->randomElement(['overdue', 'due', 'draft', 'partial', 'sent']),
                'payment_date' => $due == 0 ? now() : null,
                'due_date' => now()->addDays(7)->format('Y-m-d'),
                'issue_date' => now()->format('Y-m-d'),
            ]);
            $invoice[0]->fiscalYears()->attach($fiscalYear2->id, [
                'discount' => $discount - random_int(1, 5),
                'sub_total' => $subTotal,
                'demand' => $total,
                'paid' => $paid,
                'due' => $due,
                'status' => $due == 0 ? 'paid' : fake()->randomElement(['overdue', 'due', 'draft', 'partial', 'sent']),
                'payment_date' => $due == 0 ? now() : null,
                'due_date' => now()->addDays(7)->format('Y-m-d'),
                'issue_date' => now()->format('Y-m-d'),
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
