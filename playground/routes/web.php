<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// This is just the same with the code above
Route::view('/', 'welcome');

Route::get('/hello', function () {
    return '<h1>Hello World!</h1>';
});

Route::prefix('/users')->name('users.')->group(function () {

    // /users/profile/edit
    Route::get('/admins/LathrellPagsuguiron/profile/edit', function () {
        return 'Profile Edit Page';
    })->name('profile.edit');

    // /yser/settings
    Route::get('/settings', function () {
        return 'User settings';
    })->name('settings');

    // "?" - Makes it optional, and we need to also have a fallback which is null
    Route::get('profile/show/{id?}', function ($id = null) {
        return 'Profile Show Page: ' . $id;
    })->name('profile.show');
});

Route::redirect('/from', 'users/settings', 301)->name('redirect.to.settings');

Route::fallback(function () {
    return 'This is a fallback!';
});
