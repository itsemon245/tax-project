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
            $table->string('reference_no')->nullable();
            $table->string('circle')->nullable();
            $table->longText('description')->nullable();
            $table->string('purpose')->nullable();
            $table->integer('amount')->default(0);
            $table->integer('discount')->nullable();
            $table->integer('tax')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->enum('payment_method',['bkash', 'nagad','rocket', 'bank', 'cash'])->default('cash');
            $table->enum('status',['overdue', 'outstanding', 'draft', 'partial', 'sent', 'paid'])->default('draft');
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
