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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('service_sub_category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('title');
            $table->mediumText('intro');
            $table->longText('description');
            $table->integer('price');
            $table->integer('discount');
            $table->decimal('rating');
            $table->json('sections')->comment('{title:"title, image: "image", description: "description"}');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
