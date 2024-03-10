<?php

use App\Http\Controllers\Admin\AnakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TimbanganController;
use App\Http\Controllers\User\UserController;
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

// USER
Route::middleware(['auth'])->controller(UserController::class)
    ->group(function () {
        Route::group(['get'], function () {
            Route::get('dashboard/user', 'index')->name('user.index');
            Route::get('dashboard/user/{user}', 'show')->name('user.show');
            Route::get('dashboard/user/{user}/edit', 'edit')->name('user.edit');
        });

        Route::group(['post', 'patch'], function () {
            Route::post('user/logout', 'logout')
                ->name('user.logout');
            Route::patch('dashboard/user/{user}/update', 'update')
                ->name('user.update');
        });
    });

// ADMIN
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
            Route::post('/dashboard/admin', 'logout')
                ->name('admin.logout');
            Route::post('/dashboard/admin/create/user', 'store')
                ->name('admin.store');
            Route::put('/dashboard/admin/{username}', 'updateUser')
                ->name('admin.user.update');
            Route::delete('/dashboard/admin/users/{username}', 'delete')
                ->name('admin.user.delete');
        });
    });

Route::middleware('admin')->controller(AnakController::class)
    ->group(function () {
        Route::get('/dashboard/admin/users/{username}/anak/{anak:id}', 'show')->name('admin.anak.show')->scopeBindings();
        Route::post('/dashboard/admin/users/{username}/anak/create', 'store')->name('admin.anak.store');
        Route::put('/dashboard/admin/users/anak/{id}',  'update')
            ->name('admin.anak.update');
        Route::delete('/dashboard/admin/users/anak/{id}', 'delete')
            ->name('admin.anak.delete');
    });



Route::middleware('auth')->group(function () {
    Route::get('/dashboard/user/{user}/anak/{anak:id}', [AnakController::class, 'show'])
        ->name('anak.show');
    Route::put('/dashboard/user/anak/{id}', [AnakController::class, 'update'])->name('anak.update');
});



Route::middleware('admin')->group(function () {
    // TIMBANG UPDATE
    Route::put('/dashboard/admin/users/anak/{id}/timbang', [TimbanganController::class, 'update'])->name('admin.update.timbang');
    // ------------------------------
    Route::get('/dashboard/admin/regions/{city:slug}', [RegionController::class, 'index'])->name('admin.region');
});
