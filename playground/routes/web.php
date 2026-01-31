<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

// Route::view('/', 'hello');

// Route::get('/hello', function () {
//     return "<h1 style='color: red'>Hello</h1>";
// });

// Route::prefix('users')->name('users.')->group(function () {
//     Route::get('/profile/edit', function () {
//         return 'Profile Edit Page';
//     })->name('profile.edit'); // this is an alias name for the route

//     Route::get('settings', function () {
//         return 'User Settings';
//     })->name('settings');

//     Route::get('profile/show/{id?}', function ($userId = 0) {
//         return 'Profile ID: ' . $userId;
//     });

//     Route::get('profile/delete/{id}', function (int $userId) {
//         return 'Deleted Profile ID: ' . $userId;
//     })->whereNumber('userId');
// });

// Route::redirect('/from', '/users/settings')->name('redirect.to.settings');

// // Route::fallback(function () {
// //     return "404 not found!";
// // });

// Route::get('/form', function (Request $request) {
//     $name = $request->name;
//     $date = $request->date('birthdate');
//     dd($date->diffForHumans());
// });

Route::get('/profile', [UserController::class, 'getProfile']);

Route::get('/grades', [UserController::class, 'getGrade']);

Route::view('/register', 'register', ['first_name' => 'John', 'last_name' => 'Doe']);
