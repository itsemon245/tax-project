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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->uuid('txn_id');
            $table->enum('billing_type', ['monthly', 'yearly', 'onetime'])->nullable();
            $table->enum('payment_method', ['cash', 'bkash', 'nagad', 'rocket', 'bank', 'card'])->nullable();
            $table->decimal('payment_amount', 8, 2);
            $table->decimal('payment_due', 8, 2);
            $table->enum('status', ['paid', 'partial', 'overdue', 'expired']);
            $table->dateTime('due_date')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->timestamps();
        });
        Schema::create('purchasables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->morphs('purchasable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('purchasables');
    }
};
