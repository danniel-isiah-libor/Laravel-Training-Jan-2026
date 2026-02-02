<?php

use App\Models\User;

test('admin is blocked from creating posts', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get('/posts/create')
        ->assertStatus(403)
        ->assertSee('Access denied for admin users');
});

test('regular user can access create post', function () {
    $user = User::factory()->create(['role' => 'user']);

    $this->actingAs($user)
        ->get('/posts/create')
        ->assertStatus(200);
});

test('guest can access create post', function () {
    $this->get('/posts/create')
        ->assertStatus(200);
});
