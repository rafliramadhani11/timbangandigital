<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TimbanganController;
use App\Http\Controllers\AuthenticationController;

Route::middleware('guest')->controller(AuthenticationController::class)
    ->group(function () {
        Route::group(['get'], function () {
            Route::get('/login', 'login')->name('login');
            Route::get('/register', 'register')->name('register');
        });

        Route::group(['post'], function () {
            Route::post('/login', 'auth')->name('login');
            Route::post('/register', 'store')->name('buatakun');
        });
    });

Route::middleware('admin')->controller(AdminController::class)
    ->group(function () {
        Route::group(['get'], function () {
            Route::get('/dashboard/admin', 'index')
                ->name('admin.index');
            Route::get('/dashboard/admin/users', 'allUsers')
                ->name('admin.users');
            Route::get('/dashboard/admin/users/{username}', 'showUser')
                ->name('admin.show');
            Route::get('/dashboard/admin/{username}/edit', 'editUser')
                ->name('admin.edit');
            Route::get('/dashboard/admin/create', 'create')
                ->name('admin.create');
        });

        Route::group(['post', 'put', 'delete'], function () {
            Route::post('/dashboard/admin/create/user', 'store')
                ->name('admin.store');
            Route::put('/dashboard/admin/{username}', 'updateUser')
                ->name('admin.user.update');
            Route::delete('/dashboard/admin/users/{username}', 'delete')
                ->name('admin.user.delete');
        });
    });

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout'])
        ->name('logout');
    Route::get('/dashboard/user/{user}/anak/{anak:id}', [AnakController::class, 'show'])
        ->name('anak.show');
    Route::put('/dashboard/user/anak/{id}', [AnakController::class, 'update'])->name('anak.update');
    Route::resource('/dashboard/user', UserController::class)
        ->except(['store', 'destroy', 'create']);
});




Route::middleware('admin')->group(function () {
    // ANAK
    Route::get('/dashboard/admin/users/{username}/anak/{anak:id}', [AdminController::class, 'showAnak'])->name('admin.anak.show')->scopeBindings();
    Route::post('/dashboard/admin/users/{username}/anak/create', [AdminController::class, 'storeAnak'])->name('admin.anak.store');
    // -------------------------------------------------------------------------
    // TIMBANG UPDATE
    Route::put('/dashboard/admin/users/anak/{id}/timbang', [TimbanganController::class, 'update'])->name('admin.update.timbang');
    // -------------------------------------------------------------------------
    Route::put('/dashboard/admin/users/anak/{id}', [AdminController::class, 'updateAnak'])->name('admin.anak.update');
    Route::delete('/dashboard/admin/users/anak/{id}', [AdminController::class, 'deleteAnak'])->name('admin.anak.delete');
    // ------------------------------
    Route::get('/dashboard/admin/regions/{city:slug}', [RegionController::class, 'index'])->name('admin.region');
});
