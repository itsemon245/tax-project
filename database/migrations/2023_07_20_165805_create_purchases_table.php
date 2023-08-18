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
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('promo_code_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('name')->nullable();
            $table->string('contact_number')->nullable();
            $table->decimal('discount', 8, 2);
            $table->boolean('has_promo_code_applied')->default(false);
            $table->enum('billing_type', ['monthly', 'yearly', 'onetime'])->nullable();
            $table->enum('payment_method', ['bkash', 'nagad', 'rocket'])->nullable();
            $table->string('payment_number')->nullable();
            $table->string('trx_id')->nullable();
            $table->json('metadata')->nullable();
            $table->decimal('payable_amount', 8, 2);
            $table->decimal('paid', 8, 2);
            $table->decimal('due', 8, 2);
            $table->enum('status', ['paid', 'partial', 'due']);
            $table->dateTime('due_date')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->boolean('is_expired')->default(false);
            $table->morphs('purchasable');
            $table->integer('approved')->default(0);
            $table->timestamps();
        });
        // Schema::create('purchasables', function (Blueprint $table) {
        //     $table->id();

        // });
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
