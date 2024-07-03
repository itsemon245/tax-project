<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('user_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('expert_profile_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('name');
            $table->text('email');
            $table->text('phone');
            $table->text('district');
            $table->text('thana');
            $table->date('date');
            $table->text('time');
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_physical')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('user_appointments');
    }
};
