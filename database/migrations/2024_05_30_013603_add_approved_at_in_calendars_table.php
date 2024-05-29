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
        Schema::table('calendars', function (Blueprint $table) {
            $table->date('completed_at')->nullable();
            $table->date('rejected_at')->nullable();
            $table->dropColumn(['is_completed']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calendars', function (Blueprint $table) {
            $table->dropColumn(['completed_at', 'rejected_at']);
            $table->boolean('is_completed');
        });
    }
};
