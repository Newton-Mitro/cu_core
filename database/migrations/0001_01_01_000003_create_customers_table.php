<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('customer_no', 50)->unique();
            $table->enum('type', ['Individual', 'Organization']);
            $table->string('full_name', 150);
            $table->string('registration_no', 150)->nullable(); // For organizations
            $table->date('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('religion', ['Christianity', 'Islam', 'Hinduism', 'Buddhism', 'Other'])->nullable();
            $table->enum('identification_type', ['NID', 'NBR', 'Passport', 'Driving License']);
            $table->string('identification_number', 50);
            $table->string('photo', 255)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->enum('kyc_level', ['MIN', 'STD', 'ENH'])->default('MIN');
            $table->enum('status', ['PENDING', 'ACTIVE', 'SUSPENDED', 'CLOSED'])->default('ACTIVE');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
