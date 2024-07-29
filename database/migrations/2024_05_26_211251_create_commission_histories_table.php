<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('commission_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')
            ->constrained('users')
            ->cascadeOnDelete();
            $table->foreignId('referee_id')
            ->constrained('users')
            ->cascadeOnDelete();
            $table->string('item_name');
            $table->string('item_type');
            $table->string('trx_id');
            $table->unsignedBigInteger('item_id');
            $table->decimal('item_price', 8, 4);
            $table->decimal('percentage', 8, 4)->nullable();
            $table->decimal('earning', 8, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('commission_histories');
    }
};
