<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatContorller;
use App\Http\Controllers\SocialiteController;

Route::get('/auth/google', [SocialiteController::class, 'redirectToProvider'])->name('google');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleProviderCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/tasks', TaskController::class);
    Route::post('/tasks/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
    Route::get('riwayat',[RiwayatContorller::class, 'riwayat'])->name('tasks.riwayat');
});

require __DIR__.'/auth.php';
