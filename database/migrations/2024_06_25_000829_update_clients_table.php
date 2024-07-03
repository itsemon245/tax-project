<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('tin')->nullable()->change();
            $table->string('nid')->nullable()->change();
            $table->string('circle')->nullable()->change();
            $table->string('zone')->nullable()->change();
            $table->date('dob')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('taxpayer_status')->nullable()->change();
            $table->longText('special_benefits')->nullable()->change();
            $table->string('father_name')->nullable()->change();
            $table->string('mother_name')->nullable()->change();
            $table->string('company_name')->nullable()->change();
            $table->string('spouse_name')->nullable()->change();
            $table->string('spouse_tin')->nullable()->change();
            $table->longText('present_address')->nullable()->change();
            $table->longText('permanent_address')->nullable()->change();
            $table->string('nature_of_business')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
    }
};
