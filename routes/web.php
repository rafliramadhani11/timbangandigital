<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\AuthenticationController;


Route::middleware(['guest'])->group(function () {
    Route::post('/login', [AuthenticationController::class, 'auth'])->name('authlogin');
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
    Route::post('/register', [AuthenticationController::class, 'store'])->name('buatakun');;
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::resource('/dashboard/user', UserController::class)->except(['store', 'create', 'destroy']);
});


Route::middleware('admin')->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/dashboard/admin/users', [AdminController::class, 'allUsers'])->name('admin.users');
    Route::get('/dashboard/admin/users/{username}', [AdminController::class, 'showUser'])->name('admin.show');
    Route::get('/dashboard/admin/{username}/edit', [AdminController::class, 'editUser'])->name('admin.edit');
    Route::get('/dashboard/admin/users/regions/{city:slug}', [AdminController::class, 'allRegions'])->name('admin.regions');

    Route::put('/dashboard/admin/{username}', [AdminController::class, 'updateUser'])->name('admin.user.update');

    Route::delete('/dashboard/admin/users/{username}', [AdminController::class, 'delete'])->name('admin.user.delete');
});
