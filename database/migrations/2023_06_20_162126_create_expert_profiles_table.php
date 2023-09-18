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
        Schema::create('expert_profiles', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('post'); #filter পদবী
            $table->longText('bio')->nullable();
            $table->text('image')->nullable();
            $table->integer('experience'); #filterable
            $table->date('join_date');
            $table->string('availability');
            $table->longText('at_a_glance')->nullable();
            $table->longText('description');
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->foreignId('map_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('discount')->nullable();
            $table->enum('billing_type', ['onetime'])->default('onetime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_profiles');
    }
};
