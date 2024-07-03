<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('chalans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
            ->constrained()
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->string('chalan_no')->nullable();
            $table->date('date')->nullable();
            $table->string('code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('name')->nullable();
            $table->longText('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('purpose')->nullable();
            $table->longText('description')->nullable();
            $table->string('year')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('cheque_no')->nullable();
            $table->date('cheque_expire_date')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('amount_in_words')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('chalans');
    }
};
