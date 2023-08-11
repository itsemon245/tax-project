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
        Schema::create('case_study_packages', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('limit')->default(0)->nullable();
            $table->enum('billing_type', ['monthly', 'yearly', 'onetime'])->default('onetime')->nullable();
            $table->longText('page_title')->nullable();
            $table->longText('page_description')->nullable();
            $table->longText('page_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_study_pages');
    }
};
