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
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('case_study_category_id');
            $table->foreignId('case_study_package_id')->nullable();
            $table->text('title');
            $table->longText('page_description');
            $table->text('duration');
            $table->text('type');
            $table->integer('orders');
            $table->integer('rate');
            $table->longText('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
