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
        Schema::create('chalans', function (Blueprint $table) {
            $table->id();
            $table->string('chalan_no')->nullable();
            $table->string('date')->nullable();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('client_id')
            ->constrained()
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->string('purpose')->nullable();
            $table->string('year')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('amount_in_words')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chalans');
    }
};
