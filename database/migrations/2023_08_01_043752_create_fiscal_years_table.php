<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fiscal_years', function (Blueprint $table) {
            $table->id();
            $table->string('year')->unique();
            $table->timestamps();
        });
        Schema::create('fiscal_year_invoice', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('fiscal_year_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('discount')->nullable();
            $table->integer('sub_total')->default(0);
            $table->integer('demand')->default(0);
            $table->integer('paid')->default(0);
            $table->integer('due')->default(0);
            $table->timestamp('payment_date')->nullable();
            $table->timestamp('due_date')->default(now()->addDays(7)->format('Y-m-d'));
            $table->timestamp('issue_date')->default(now()->format('Y-m-d'));
            $table->enum('status', ['overdue', 'due', 'draft', 'partial', 'sent', 'paid'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_fiscal_year');
        Schema::dropIfExists('fiscal_years');
    }
};
