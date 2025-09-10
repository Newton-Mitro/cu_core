<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('insurance_products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
            $table->enum('coverage_type', ['LIFE', 'HEALTH', 'PROPERTY', 'OTHER'])->default('LIFE');
            $table->decimal('min_premium', 18, 2);
            $table->decimal('max_premium', 18, 2);
            $table->enum('premium_cycle', ['MONTHLY', 'QUARTERLY', 'ANNUAL'])->default('MONTHLY');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('insurance_products');
    }
};
