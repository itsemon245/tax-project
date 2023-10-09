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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('promo_code_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->string('contact_number')->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->boolean('has_promo_code_applied')->default(false);
            $table->enum('billing_type', ['monthly', 'yearly', 'onetime'])->nullable();
            $table->enum('payment_method', ['bkash', 'nagad', 'rocket'])->nullable();
            $table->string('payment_number')->nullable();
            $table->string('trx_id')->nullable();
            $table->json('metadata')->nullable();
            $table->decimal('payable_amount', 8, 2)->nullable();
            $table->decimal('paid', 8, 2)->nullable();
            $table->decimal('due', 8, 2)->nullable();
            $table->enum('status', ['paid', 'partial', 'due', 'rejected', 'expired']);
            $table->date('due_date')->default(today()->addDays(10))->nullable();
            $table->date('payment_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->boolean('is_expired')->default(true)->nullable();
            $table->morphs('purchasable');
            $table->integer('approved')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
        // Schema::dropIfExists('purchasables');
    }
};
