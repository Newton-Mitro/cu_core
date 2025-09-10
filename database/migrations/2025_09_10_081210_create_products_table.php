<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', [
                'SAVINGS',
                'SHARE',
                'RECURRING_DEPOSIT',
                'FIXED_DEPOSIT',
                'INSURANCE',
                'LOAN',
            ]);
            $table->string('code', 50)->unique();
            $table->string('name', 100);
            $table->boolean('is_active')->default(true);

            // GL mappings
            $table->unsignedBigInteger('gl_interest_id')->nullable();
            $table->unsignedBigInteger('gl_fees_income_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
