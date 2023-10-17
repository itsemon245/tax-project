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
            $table->string('name');
            $table->string('tin');
            $table->string('nid');
            $table->string('circle');
            $table->string('zone');
            $table->date('dob');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('taxpayer_status');
            $table->longText('special_benefits')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('company_name');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_tin')->nullable();
            $table->longText('present_address');
            $table->longText('permanent_address');
            $table->string('nature_of_business');
            $table->string('ref_no');
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
