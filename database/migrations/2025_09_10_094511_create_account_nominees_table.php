<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('account_nominees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('nominee_id')->constrained('customers');
            $table->decimal('share_percentage', 5, 2)->default(0);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('account_nominees');
    }
};
