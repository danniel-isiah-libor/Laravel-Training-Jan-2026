<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/profile/edit', function () {
        return 'Profile Edit Page';
    })->name('profile.edit');

    Route::get('/profile/show/{id?}', function (?int $id = null) {
        return 'Profile Show Page' . $id;
    })->name('profile.show');

    Route::get('/settings', function () {
        return 'Settings Page';
    })->name('settings');
});

Route::get('/from', function () {
    return redirect()->route('users.settings');
})->name('redirect.to.settings');

Route::get('/form', function (Request $request) {
    /* $name = $request->name; */

    $birthDate = $request->date('birthdate');

    dd($birthDate->diffForHumans());
});

Route::get('/info', [UserController::class, 'getInfo'])->name('user.info');
Route::get('/grade', [UserController::class, 'getGrade'])->name('grade');
