<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [UserController::class, 'home'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::get('admin/dashboard', [UserController::class, 'index'])
//     ->middleware(['auth', 'admin'])
//     ->name('admin.dashboard');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard',[ UserController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/post',[ UserController::class, 'post'])->name('admin.post');
    Route::get('/dashboard/create',[ UserController::class, 'create'])->name('admin.create');
    Route::post('/dashboard/store',[ UserController::class, 'store'])->name('admin.store');
    Route::get('/dashboard/show/{id}',[ UserController::class, 'show'])->name('admin.show');
    Route::get('/dashboard/edit/{id}',[ UserController::class, 'edit'])->name('admin.edit');
    Route::put('/dashboard/update/{id}',[ UserController::class, 'update'])->name('admin.update');
    Route::delete('/dashboard/destroy/{id}',[ UserController::class, 'destroy'])->name('admin.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
