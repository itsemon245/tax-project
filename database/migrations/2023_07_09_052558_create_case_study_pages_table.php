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
        Schema::create('case_study_pages', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->longText('hero_title');
            $table->longText('hero_description');
            $table->longText('hero_image');
            $table->longText('description');
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
