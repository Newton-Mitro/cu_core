<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customer_family_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->foreignId('relative_id')->constrained('customers')->cascadeOnDelete();
            $table->string('relation_type', 50);
            $table->string('reverse_relation_type', 50);
            $table->timestamps();

            $table->unique(['customer_id', 'relative_id']); // prevent duplicates
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_family_relations');
    }
};
