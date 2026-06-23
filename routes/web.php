<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========== LIVEVIEW ROUTES ==========
Route::livewire('/', 'pages::main.test')->name('home');
Route::livewire('/post/{postId}', 'pages::post.detail')->name('post.detail');
Route::livewire('/about','pages::about')->name('about');
// =====================================

require __DIR__.'/auth.php';
