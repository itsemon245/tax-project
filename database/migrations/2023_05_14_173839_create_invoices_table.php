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
            $table->string('circle')->nullable();
            $table->longText('notes')->nullable();
            $table->string('purpose')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('sub_total')->default(0);
            $table->integer('total')->default(0);
            $table->integer('amount_paid')->default(0);
            $table->integer('amount_due')->default(0);
            $table->longText('payment_details')->comment('a json object containing: amount, date, method, notes');
            $table->timestamp('due_date')->nullable();
            $table->timestamp('issue_date')->default(Carbon\Carbon::now()->format('Y-m-d'));
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
