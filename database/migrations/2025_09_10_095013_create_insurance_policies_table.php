<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('insurance_policies', function (Blueprint $t) {
            $t->foreignId('account_id')->primary()->constrained('accounts')->cascadeOnDelete();
            $t->string('policy_no', 50)->unique();
            $t->date('start_date');
            $t->date('end_date');
            $t->decimal('premium_amount', 18, 2);
            $t->enum('premium_cycle', ['MONTHLY', 'QUARTERLY', 'ANNUAL'])->default('MONTHLY');
            $t->enum('status', ['ACTIVE', 'LAPSED', 'CANCELLED', 'CLAIMED'])->default('ACTIVE');
            $t->string('beneficiary', 150)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('insurance_policies');
    }
};
