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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('client_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('header_image')->nullable();
            $table->string('reference_no')->nullable();
            $table->longText('note')->nullable();
            $table->text('payment_note')->nullable();
            $table->enum('payment_method',['cash', 'bkash', 'nagad', 'rocket', 'bank', 'card'])->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
