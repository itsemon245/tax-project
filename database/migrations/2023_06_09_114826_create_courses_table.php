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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->mediumText('page_title');
            $table->longText('description');
            $table->longText('page_banner');
            $table->decimal('price', 8, 2);
            $table->longText('preview');
            $table->json('page_cards')->comment('[{title: title, description:description}]');
            $table->json('page_learn_more')->comment('{description:string, images: array[]}')->nullable();
            $table->longText('includes')->nullable();
            $table->longText('graduates_receive')->nullable();
            $table->json('page_topics')->comment('description:string, lists: array[]}')->nullable();
            $table->boolean('is_discount_fixed')->default(false)->comment('true = Discount is fixed, false = Discount is percentage');
            $table->integer('discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
