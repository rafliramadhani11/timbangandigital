<?php

use App\Models\User;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\RegionController;
use App\Http\Controllers\TimbanganController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AnakController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\User\AnakController as UserAnakController;

// GUEST
Route::middleware(['guest'])->controller(AuthenticationController::class)
    ->group(function () {
        Route::group(['get'], function () {
            Route::get('/', 'login')->name('login');
            Route::get('/register', 'register')->name('register');

            Route::get('forgot-password', function () {
                return view('guest.forgot-password');
            });

            Route::get('reset-password/{id}/{token}', function ($id, $token) {
                $user = User::where('id', $id)->first();
                if (!$user) {
                    return 'Whoopss User not found';
                }
                $key = 'example_key';

                $payload = JWT::decode($token, new Key($key, 'HS256'));
                return view('guest.reset-password', [
                    'username' => $payload->username,
                    'user' => $user
                ]);
            })->name('reset-password');;
        });

        Route::group(['post'], function () {
            Route::post('/', 'auth')->name('login.post');
            Route::post('/register', 'store')->name('buatakun');

            Route::post('forgot-password', 'forgotPassword');
            Route::post('reset-password/{id}/{token}', 'resetPassword');
        });
    });
// -----------------------------------------

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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/user/{user}/anak/{anak:id}', [UserAnakController::class, 'show'])->name('anak.show');
    Route::put(
        '/dashboard/user/anak/{id}',
        [UserAnakController::class, 'update']
    )
        ->name('anak.update');
});
//  ----------------------------------------

// ADMIN
Route::middleware(['admin'])->controller(AdminController::class)
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

Route::middleware(['admin'])->controller(AnakController::class)
    ->group(function () {
        Route::get('/dashboard/admin/users/{username}/anak/{anak:id}', 'show')->name('admin.anak.show')->scopeBindings();
        Route::post('/dashboard/admin/users/{username}/anak/create', 'store')->name('admin.anak.store');
        Route::put('/dashboard/admin/users/anak/{id}',  'update')
            ->name('admin.anak.update');
        Route::delete('/dashboard/admin/users/anak/{id}', 'delete')
            ->name('admin.anak.delete');
    });

Route::middleware(['admin'])->controller(TimbanganController::class)
    ->group(function () {
        Route::put('/dashboard/admin/users/anak/{id}/timbang', 'update')->name('admin.update.timbang');
    });

Route::middleware(['admin'])->controller(RegionController::class)
    ->group(function () {
        Route::get('/dashboard/admin/regions/{city:slug}',  'index')
            ->name('admin.region');
    });
// ----------------------------------------
