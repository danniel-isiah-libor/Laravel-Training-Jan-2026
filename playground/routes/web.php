<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return '<h1 style = color:purple>Hello World!</h1>';
});

Route::prefix('users')->group(function () {
    Route::get('profile/edit', function () {
        return 'Profile Edit Page';
    })->name('profile.edit');
    Route::get('profile/show{id?}', function ($id = null) {
        return 'Profile Show Page:' . $id;
    })->name('profile.show');
    Route::get('settings', function () {
        return 'User Setting Page';
    })->name('settings');
});
Route::redirect('/form', '/user/settings')->name('redirect.to.settings');

Route::get('/form', function (Request $request) {
    $name = $request->name;
    $birthDate = $request->date('birthdate');
    dd($birthDate->diffForHumans());
});


Route::redirect('/form', '/user/settings')->name('redirect.to.settings');

Route::get('/grade', [UserController::class, 'getGrade']);
Route::get('/getprofile', [UserController::class, 'getProfile']);

Route::view('/register', 'register', ['first_name' => 'John', 'last_name' => 'Doe']);

Route::view('/register', 'register')->name('register.page');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
