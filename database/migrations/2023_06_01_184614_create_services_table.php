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
            $table->integer('price')->nullable();
            $table->longText('price_description')->nullable();
            $table->integer('discount')->default(0);
            $table->boolean('is_discount_fixed')->default(false);
            $table->timestamp('delivery_date')->default(now()->addDays(3)->format("Y-m-d"));
            $table->decimal('rating');
            $table->text('reviews');
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
