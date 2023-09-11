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
        Schema::create('tax_calculators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('tax_for')->nullable();
            $table->string('income_source')->nullable();
            $table->unsignedBigInteger('yearly_turnover')->nullable();
            $table->unsignedBigInteger('yearly_income')->nullable();
            $table->unsignedBigInteger('total_asset')->nullable();
            $table->unsignedBigInteger('rebate')->nullable();
            $table->unsignedBigInteger('deduction')->nullable();
            $table->string('gender')->nullable();
            $table->longText('message')->nullable();
            $table->double('tax')->nullable();
            $table->json('others')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_calculators');
    }
};
