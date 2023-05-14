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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->text('client_name');
            $table->text('father_name');
            $table->text('mother_name');
            $table->text('company_name');
            $table->text('husband/wife_name');
            $table->text('present_address');
            $table->text('parmentat_address');
            $table->text('tin');
            $table->text('circle');
            $table->text('zone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
