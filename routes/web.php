<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

# Главная → список статей
Route::get('/', fn () => redirect()->route('articles.index'));

# CRUD статей
Route::resource('articles', ArticleController::class);

# Всё, что требует авторизации
Route::middleware(['auth'])->group(function () {
    # Dashboard
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    # Профиль
    Route::get('/profile',   [ProfileController::class, 'edit'   ])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update' ])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

# Стандартные Breeze-маршруты (login, register, …)
require __DIR__.'/auth.php';
