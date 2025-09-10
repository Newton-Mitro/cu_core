<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('deposit_products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
            $table->unsignedBigInteger('gl_control_id');
            $table->enum('interest_method', ['DAILY', 'MONTHLY', 'QUARTERLY', 'NONE'])->default('NONE');
            $table->integer('rate_bp');
            $table->decimal('min_opening_amount', 18, 2)->default(0);
            $table->integer('lock_in_days')->default(0);
            $table->integer('penalty_break_bp')->default(0);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deposit_products');
    }
};
