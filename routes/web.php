<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function() {
        Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');

        Route::get('/search', [SearchController::class, 'byDate'])->name('search-by-date');
    });


    Route::prefix('transaction')->group(function() {
        Route::get('/create', [TransactionController::class, 'create'])->name('transaction.create');
        Route::post('/store', [TransactionController::class, 'store'])->name('transaction.store');

        Route::get('/edit/{hashid}', [TransactionController::class, 'edit'])->name('transaction.edit');
        Route::put('/update', [TransactionController::class, 'update'])->name('transaction.update');

        Route::delete('/destroy', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
