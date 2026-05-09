<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


// User zone
Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);


Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin zone


// Public zone




require __DIR__.'/auth.php';
