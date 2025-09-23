<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (any logged-in user)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (any logged-in user)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Books (all users can view list)
    Route::get('/books', [BookController::class, 'index'])->name('books.index');

    // Books (only admin can create, edit, delete)
    Route::middleware(['admin'])->group(function () {
        Route::resource('books', BookController::class)->except(['index', 'show']);
    });
});

require __DIR__.'/auth.php';