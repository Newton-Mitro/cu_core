<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('account_signatories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts');
            $table->foreignId('customer_id')->constrained('customers');
            $table->string('signature_path', 255);
            $table->enum('mandate', ['SOLE', 'JOINT', 'EITHER', 'VIEW_ONLY'])->default('SOLE');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('account_signatories');
    }
};

