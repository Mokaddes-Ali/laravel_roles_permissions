<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




    Route::get('/permissions', [PermissionsController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionsController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionsController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{permission}', [PermissionsController::class, 'show'])->name('permissions.show');
    Route::get('/permissions/{permission}/edit', [PermissionsController::class, 'edit'])->name('permissions.edit');
    Route::patch('/permissions/{permission}', [PermissionsController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{permission}', [PermissionsController::class, 'destroy'])->name('permissions.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
