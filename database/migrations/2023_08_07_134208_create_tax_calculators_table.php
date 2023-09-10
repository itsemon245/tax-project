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
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('tax_for')->nullable();
            $table->string('income_source')->nullable();
            $table->integer('yearly_turnover')->nullable();
            $table->integer('yearly_income')->nullable();
            $table->integer('total_asset')->nullable();
            $table->integer('rebate')->nullable();
            $table->integer('deduction')->nullable();
            $table->string('gender')->nullable();
            $table->longText('message')->nullable();    
            $table->decimal('tax')->nullable();
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
