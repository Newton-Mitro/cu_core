<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('loan_accounts', function (Blueprint $t) {
            $t->foreignId('account_id')->primary()->constrained('accounts')->cascadeOnDelete();
            $t->decimal('principal_amount', 18, 2);
            $t->decimal('outstanding_amount', 18, 2);
            $t->integer('rate_bp');
            $t->date('start_date');
            $t->date('end_date');
            $t->enum('schedule_method', ['FLAT_EQUAL', 'REDUCING', 'INTEREST_ONLY', 'CUSTOM'])->default('FLAT_EQUAL');
            $t->boolean('collateral_required')->default(false);
            $t->integer('ltv_percent')->nullable();
            $t->integer('penalty_bp')->default(0);
            $t->enum('status', ['APPROVED', 'DISBURSED', 'REPAID', 'DEFAULTED'])->default('APPROVED');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_accounts');
    }
};
