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
        Schema::table('expert_profiles', function (Blueprint $table) {
            $table->foreignId('user_id')
            ->nullable()
            ->constrained()
            ->cascadeOnDelete();

        });
        Schema::table('maps', function (Blueprint $table) {
            $table->foreignId('user_id')
            ->nullable()
            ->constrained()
            ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expert_profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('expert_profiles', function (Blueprint $table) {
            $table->dropColumn(['user_id']);
        });
        Schema::table('maps', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('maps', function (Blueprint $table) {
            $table->dropColumn(['user_id']);
        });
    }
};
