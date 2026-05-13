<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


// User zone
Route::get('/',[WelcomeController::class, 'index']) -> name('welcome');

Route::resource('categories', CategoryController::class);
Route::resource('comics', ComicController::class);

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin zone
Route::prefix('admin')->middleware( \App\Http\Middleware\IsAdmin::class)->name('admin.')->group( function() {

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);


});


// Public zone




require __DIR__.'/auth.php';
