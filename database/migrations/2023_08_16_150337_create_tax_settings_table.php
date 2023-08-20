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
        Schema::create('tax_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('basic/deluxe etc');
            $table->integer('turnover_percentage')->nullable()->comment('for Turnover');
            $table->json('tax_free')->nullable()->comment('male:amount,female:amount');
            $table->enum('type', ['tax', 'others']);
            $table->enum('for', ['firm', 'individual', 'company']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_settings');
    }
};
