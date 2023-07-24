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
            $table->integer('discount')->nullable();
            $table->integer('sub_total')->default(0);
            $table->integer('total')->default(0);
            $table->integer('amount_paid')->default(0);
            $table->integer('amount_due')->default(0);
            $table->text('payment_note')->nullable();
            $table->enum('payment_method',['cash', 'bkash', 'nagad', 'rocket', 'bank', 'card'])->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->timestamp('due_date')->default(now()->addDays(7)->format('Y-m-d'));
            $table->timestamp('issue_date')->default(now()->format('Y-m-d'));
            $table->enum('status',['overdue', 'due', 'draft', 'partial', 'sent', 'paid'])->default('draft');
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
