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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_category_id');#filterable
            $table->text('title')->nullable();
            $table->text('author')->nullable();#filterable
            $table->longText('description');
            $table->longText('sample_pdf')->nullable();
            $table->longText('pdf')->nullable();
            $table->string('thumbnail')->nullable();
            $table->decimal('price', 8, 2)->nullable();#filterable
            $table->boolean('is_discount_fixed')->default(false)->comment('true = Discount is fixed, false = Discount is percentage');
            $table->integer('discount')->nullable();
            $table->enum('billing_type', ['onetime'])->default('onetime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
