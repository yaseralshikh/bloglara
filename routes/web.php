<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/dashboard', [UserController::class, 'home'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::get('admin/dashboard', [UserController::class, 'index'])
//     ->middleware(['auth', 'admin'])
//     ->name('admin.dashboard');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard',[ UserController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/create',[ AdminController::class, 'create'])->name('admin.create');
    Route::post('/dashboard/store',[ AdminController::class, 'store'])->name('admin.store');
    Route::get('/dashboard/show/{id}',[ AdminController::class, 'show'])->name('admin.show');
    Route::get('/dashboard/edit/{id}',[ AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/dashboard/update/{id}',[ AdminController::class, 'update'])->name('admin.update');
    Route::delete('/dashboard/destroy/{id}',[ AdminController::class, 'destroy'])->name('admin.destroy');
});

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
