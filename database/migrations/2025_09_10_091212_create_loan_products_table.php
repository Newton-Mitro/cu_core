<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('loan_products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
            $table->unsignedBigInteger('gl_principal_id');
            $table->integer('penalty_bp')->default(0);
            $table->enum('schedule_method', ['FLAT_EQUAL', 'REDUCING', 'INTEREST_ONLY', 'CUSTOM'])->default('REDUCING');
            $table->integer('max_tenor_months');
            $table->boolean('collateral_required')->default(false);
            $table->integer('ltv_percent')->nullable();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_products');
    }
};
