<?php

use App\Models\Branch;

test('registration screen can be rendered', function () {
    $response = $this->get(route('register'));

    $response->assertStatus(200);
});

test('new users can register', function () {
    // create a branch to satisfy branch_id constraint
    $branch = Branch::factory()->create();

    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'branch_id' => $branch->id,   // ✅ include branch_id
        'role' => 'TELLER',          // ✅ include role
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
