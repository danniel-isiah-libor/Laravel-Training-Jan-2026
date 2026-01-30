<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::get('/form', function (Request $request) {
    dd($request->all());
});

Route::get('/form', function (Request $request) {
    $name = $request->name;

    $birthDate = $request->date('birthdate');
    dd($birthDate->diffForHumans());

});

// Exercise attempt
Route::get('/form', function (Request $request) {
    $fullname = $request->fullname;
    $email    = $request->email;
    $username = $request->username;
    return "Name: $fullname<br />Email: $email<br />Username: $username";
});

Route::get('/form/grade', function (Request $request) {
    $grade = $request->grade;

    if ($grade < 75) {
        return 'Failed!';
    } elseif ($grade < 81) {
        return 'Passed';
    } else {
        return 'Good!';
    }
})
;

/**
 * We converted Sir Danniel's approach into using controllers instead
 */
Route::get('/get-grade', [UserController::class, 'getGrade']);
Route::get('/get-profile', [UserController::class, 'getDetails']);