<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Branch::factory()
            ->count(10) // Create 10 branches
            ->create();

        // 2️⃣ Seed Users
        User::factory()
            ->count(5) // Create 50 users
            ->create();

        // Optional: you can also create admin users manually
        User::create([
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'name' => 'Admin User',
            'email' => 'super.admin@email.com',
            'password' => bcrypt('password'),
            'status' => 'ACTIVE',
            'employee_id' => null
        ]);

    }
}