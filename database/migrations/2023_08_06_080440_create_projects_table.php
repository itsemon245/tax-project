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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->date('start_date')->default(now());
            $table->date('end_date')->default(now()->addDays(10));
            $table->integer('weekdays')->default(5);
            $table->integer('total_target');
            $table->integer('daily_target');
            $table->integer('weekly_target');
            $table->integer('monthly_target');
            // $table->integer('total_progress')->default(0);
            // $table->integer('daily_progress')->nullable();
            // $table->integer('weekly_progress')->nullable();
            // $table->integer('monthly_progress')->nullable();
            $table->timestamps();
        });
        Schema::create('client_project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('project_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('is_completed')->default(false);
            $table->integer('total_progress')->default(0);
            $table->integer('daily_progress')->nullable();
            $table->integer('weekly_progress')->nullable();
            $table->integer('monthly_progress')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
