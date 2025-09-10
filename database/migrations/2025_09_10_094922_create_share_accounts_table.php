<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('share_accounts', function (Blueprint $t) {
            $t->foreignId('account_id')->primary()->constrained('accounts')->cascadeOnDelete();
            $t->integer('total_shares');
            $t->decimal('share_price', 18, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('share_accounts');
    }
};
