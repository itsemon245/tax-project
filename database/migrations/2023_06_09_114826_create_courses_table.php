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
            $table->json('page_card_1')->comment('{title: title, description:description}');
            $table->json('page_card_exam')->comment('{title: title, description:description}');
            $table->json('page_learn_more')->comment('{description:string, images: array[]}');
            $table->mediumText('includes');
            $table->mediumText('graduates_receive');
            $table->json('topics')->comment('{title: string, description:string, lists: array[]}');
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
