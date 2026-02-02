<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;
use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/settings.php';

Route::middleware([CheckRoleMiddleware::class, 'auth', 'verified'])->group(function () {
    Route::resource('/posts', PostController::class)
        ->except(['index']);
});


Route::resource('/shows', ShowController::class);
