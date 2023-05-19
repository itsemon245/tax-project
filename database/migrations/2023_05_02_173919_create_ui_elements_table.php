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
        Schema::create('ui_elements', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default(env('APP_NAME'));
            $table->string('app_logo')->default('uploads/logo/app-logo.svg');
            $table->boolean('has_expert_btn')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ui_elements');
    }
};
