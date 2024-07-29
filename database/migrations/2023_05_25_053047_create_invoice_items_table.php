<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('name');
            $table->mediumText('description')->nullable();
            $table->integer('rate');
            $table->integer('qty');
            $table->integer('total');
            $table->longText('taxes')->comment('a json object that includes tax rate, tax name, tax number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('invoice_items');
    }
};
