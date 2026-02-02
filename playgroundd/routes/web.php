<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return '<h1 style="color: blue;">Hello, World!</h1>';     
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('profile/edit', function () {
        return "Profile Edit Page";    
    })->name('profile.edit');

    Route::get('settings', function () {
        return "Profile Settings Page";     
    })->name('settings');

    Route::get('profile/show/{id?}', function ($id=null) {
        return "Profile Show Page for User ID: " . $id;
    })->name('profile.show');
});

route::redirect('/from','/users/settings')->name('redirect.to.settings');

Route::fallback(function () {
    return "The page you are looking for does not exist.";
});

// Route::get('/form', function (Request $request) {
//     dd($request->all());

// $birthDate = $request->date('birthdate');

// //($birthDate->format('Y-m-d'));
// //dd($birthDate->diffForHumans());
// });

Route::get('/user/{username}', function ($username) {
    return $username;
});

Route::get('/get-grade', [UserController::class, 'getGrade']);
    
Route::get('/get-profile', [UserController::class, 'getProfile']);

Route::view('/register', 'register')->name('register.page');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
    
