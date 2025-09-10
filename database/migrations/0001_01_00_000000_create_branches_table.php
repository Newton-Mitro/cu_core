<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('code', 20)->unique();
            $table->string('name', 100);
            $table->string('address', 255)->nullable();
            $table->timestamps(); // created_at & updated_at with default CURRENT_TIMESTAMP behavior
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
