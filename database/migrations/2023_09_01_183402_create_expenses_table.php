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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('merchant')->nullable();
            $table->string('category')->nullable();
            $table->json('items')->nullable()->comment('description, amount');
            $table->enum('type', ['credit', 'debit'])->default('debit');
            $table->unsignedDecimal('amount')->nullable();
            $table->decimal('balance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
