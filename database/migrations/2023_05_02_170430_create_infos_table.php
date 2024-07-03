<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('section_id')->comment('1 = Section1 and 2 = Section2');
            $table->string('page_name');
            $table->string('title');
            $table->string('image_name')->nullable();
            $table->string('image_url');
            $table->mediumText('description');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('infos');
    }
};
