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
            $table->foreignId('case_study_package_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->text('name');
            $table->longText('intro');
            $table->longText('image');
            $table->longText('description');
            $table->unsignedBigInteger('likes');
            $table->unsignedBigInteger('downloads');
            $table->decimal('price', 8, 2)->default(0);
            $table->longText('download_link');
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
