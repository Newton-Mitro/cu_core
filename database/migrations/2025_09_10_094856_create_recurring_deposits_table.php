<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('recurring_deposits', function (Blueprint $t) {
            $t->foreignId('account_id')->primary()->constrained('accounts')->cascadeOnDelete();
            $t->decimal('installment_amount', 18, 2);
            $t->integer('rate_bp');
            $t->enum('cycle', ['MONTHLY'])->default('MONTHLY');
            $t->date('start_date');
            $t->integer('tenor_months');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recurring_deposits');
    }
};
