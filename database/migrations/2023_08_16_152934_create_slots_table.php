<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tax_setting_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('from')->default(0);
            $table->unsignedBigInteger('to')->default(0);
            $table->bigInteger('difference')->default(0);
            $table->integer('tax_percentage')->default(0);
            $table->string('min_tax')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->boolean('is_discount_fixed')->nullable();
            $table->enum('type', ['income', 'turnover', 'asset'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('slots');
    }
};
