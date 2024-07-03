<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('case_study_category_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade'); // filterable
            $table->foreignId('case_study_package_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade'); // filterable
            $table->text('name');
            $table->longText('intro');
            $table->longText('image');
            $table->longText('description');
            $table->unsignedBigInteger('likes')->default(0);
            $table->unsignedBigInteger('downloads')->default(0);
            $table->decimal('price', 8, 2)->default(0); // filterable
            $table->longText('download_link');
            $table->boolean('is_discount_fixed')->default(false)->comment('true = Discount is fixed, false = Discount is percentage');
            $table->integer('discount')->nullable();
            $table->enum('billing_type', ['onetime'])->default('onetime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('case_studies');
    }
};
