<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('term_deposits', function (Blueprint $t) {
            $t->foreignId('account_id')->primary()->constrained('accounts')->cascadeOnDelete();
            $t->decimal('principal', 18, 2);
            $t->integer('rate_bp');
            $t->date('start_date');
            $t->date('maturity_date');
            $t->enum('compounding', ['MONTHLY', 'QUARTERLY', 'SEMI_ANNUAL', 'ANNUAL', 'MATURITY'])->default('MATURITY');
            $t->boolean('auto_renew')->default(false);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('term_deposits');
    }
};
