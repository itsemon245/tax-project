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
        Schema::create('chalans', function (Blueprint $table) {
            $table->id();
            $table->string('chalan_no')->nullable();
            $table->string('date')->nullable();
            $table->string('chalan_title')->nullable();
            $table->string('code1')->nullable();
            $table->string('code2')->nullable();
            $table->string('code3')->nullable();
            $table->string('code4')->nullable();
            $table->string('code5')->nullable();
            $table->string('code6')->nullable();
            $table->string('code7')->nullable();
            $table->string('code8')->nullable();
            $table->string('code9')->nullable();
            $table->string('code10')->nullable();
            $table->string('code11')->nullable();
            $table->string('code12')->nullable();
            $table->string('code13')->nullable();
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('client_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tin_circle')->nullable();
            $table->string('purpose')->nullable();
            $table->string('year')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('org_name_text')->nullable();
            $table->string('taka_kothay')->nullable();
            $table->string('total_ammount')->nullable();
            $table->string('take_poua_gelo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chalans');
    }
};
