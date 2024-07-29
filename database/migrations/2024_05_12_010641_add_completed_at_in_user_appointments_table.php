<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('user_appointments', function (Blueprint $table) {
            $table->date('completed_at')->nullable();
            $table->date('approved_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('user_appointments', function (Blueprint $table) {
            $table->dropColumn('completed_at');
            $table->dropColumn('approved_at');
        });
    }
};
