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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->morphs('reviewable');
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('product_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('service_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('book_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('expert_profile_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('avatar')->nullable();
            $table->text('name')->nullable();
            $table->longText('comment');
            $table->enum('rating', [1, 2, 3, 4, 5]);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
