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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('reference_no');
            $table->string('circle');
            $table->string('note');
            $table->string('purpose');
            $table->integer('amount');
            $table->integer('discount');
            $table->integer('tax');
            $table->timestamp('due_date');
            $table->timestamp('payment_date');
            $table->enum('payment_method',['bkash', 'nagad','rocket', 'bank', 'cash'])->default('cash');
            $table->enum('status',['overdue', 'outstanding', 'draft', 'partial', 'sent', 'paid'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
