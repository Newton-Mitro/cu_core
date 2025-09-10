<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('account_customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->enum('role', ['PRIMARY_HOLDER', 'JOINT_HOLDER', 'AUTHORIZED_SIGNATORY']);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('account_customers');
    }
};

