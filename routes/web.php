<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/permissions/create', [PermissionsController::class, 'create'])->name('permission.create');
    Route::post('/permissions', [PermissionsController::class, 'store'])->name('permission.store');
    Route::get('/permissions', [PermissionsController::class, 'index'])->name('permission.index');
    Route::get('/permissions/{permission}', [PermissionsController::class, 'show'])->name('permission.show');
    Route::get('/permissions/{id}/edit', [PermissionsController::class, 'edit'])->name('permission.edit');
    Route::post('/permissions/{id}', [PermissionsController::class, 'update'])->name('permission.update');
    Route::delete('/permissions/{permission}', [PermissionsController::class, 'destroy'])->name('permission.destroy');

    //Role routes
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
