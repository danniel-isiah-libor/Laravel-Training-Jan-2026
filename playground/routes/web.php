<?php



// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/hello', function () {
    return '<h1>Hello, World!</h1>';
});

Route::prefix('users')->name('users.')->group(function () {
    // /users/profile/edit
    Route::get('/profile/edit', function () {
    return 'Profile Edit Page';
})->name('profile.edit');

    Route::get('/settings', function () {
    // users/settings
    return 'Profile Settings Page';
})->name('settings');

    route::get('profile/show/{id?}', function ($id = null) {
        return 'Profile show Page: ' .  $id;
    })->name('profile.show');
});

Route::redirect('/from', '/users/settings')->name('redirect.to.settings');

// Route::fallback(function(){
//     return '404 Not Found';
// });

Route::get('/form', function (Request $request) {
    $name = $request->name;

    $birthDate = $request->date('birthDate');

    dd($birthDate->diffForHumans());
});

    Route::get('/grade', [UserController::class, 'getGrade'])->name('profile.grade');
    
    Route::get('/user', [UserController::class, 'getProfile'])->name('profile');

