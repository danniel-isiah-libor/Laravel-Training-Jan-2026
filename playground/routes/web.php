<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'welcome');

Route::get('/hello', function () {
    return 'Hello, World!';
});

Route::prefix('users')->name('users.')->group(function () {
    // /users/profile/edit
    Route::get('profile/edit', function () {
        return 'Profile Edit Page';
    })->name('profile.edit');

    Route::get('profile/show/{id?}', function ($id = 0) {
        return 'Profile Show Page: ' . $id;
    })->name('profile.show');

    // /users/settings
    Route::get('settings', function () {
        return 'User Settings Page';
    })->name('settings');
});

Route::redirect('/from', '/users/settings')->name('redirect.to.settings');

// Route::fallback(function () {
//     return '404 Not Found - The requested page does not exist.';
// });

Route::get('/form', function (Request $request) {
    /* $name = $request->name; */

    $birthDate = $request->date('birthdate');

    dd($birthDate->diffForHumans());
});

Route::get('/get-grade', [UserController::class, 'getGrade']);
Route::get('get-profile', [UserController::class, 'getProfile']);

// Route::get();
Route::view('/register', 'register', ['first_name' => 'Simon', 'last_name' => 'Javier'])->name('register');
Route::view('/login', 'login', ['first_name' => 'Simon', 'last_name' => 'Javier'])->name('login');
