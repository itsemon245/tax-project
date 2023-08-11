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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->constrained('product_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount')->nullable();
            $table->json('package_features')->comment('user custom package features including text colors');
            $table->enum('type', ['Silver', 'Gold', 'Platinum', 'Exclusive']);
            $table->longText('description')->nullable();
            $table->boolean('is_discount_fixed')->default(false)->comment('true = Discount is fixed, false = Discount is percentage');
            $table->boolean('is_most_popular')->default(false)->comment('true = This Product is most popular, false = This Product is not most popular');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
