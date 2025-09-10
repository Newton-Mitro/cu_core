<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('savings_accounts', function (Blueprint $t) {
            $t->foreignId('account_id')->primary()->constrained('accounts')->cascadeOnDelete();
            $t->decimal('balance', 18, 2)->default(0);
            $t->decimal('min_balance', 18, 2)->default(0);
            $t->integer('interest_rate_bp')->default(0);
            $t->enum('interest_method', ['DAILY', 'MONTHLY', 'QUARTERLY'])->default('MONTHLY');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('savings_accounts');
    }
};
