<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [DashboardController::class, 'index'])->name('home');

Route::get('blogs', [BlogController::class, 'index'])->name('blogs');

Route::group(['prefix' => 'blogs', 'as' => 'blogs.'], function () {

    // Public routes
    Route::get('/{blog}', [BlogController::class, 'show'])->name('show');

    // Authenticated routes
    Route::middleware(['auth'])->group(function () {

        Route::resource('/', BlogController::class)
            ->only(['store', 'edit', 'update', 'destroy'])
            ->parameters(['' => 'blog']); // Adjust parameter binding

        Route::post('/{blog}/like', [BlogLikeController::class, 'like'])->name('like');
        Route::post('/{blog}/unlike', [BlogLikeController::class, 'unlike'])->name('unlike');
    });
});

Route::resource( 'users',UserController::class)->only('show','edit','delete')->middleware('auth');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:host']);

Route::get('/admin/blogs', [AdminDashboardController::class, 'create_blog'])->name('admin.blogs')->middleware(['auth', 'can:host']);


Route::controller(AuthController::class)->group(function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', 'register')->name('register');

        Route::post('/register', 'store');

        Route::get('/login', 'login')->name('login');

        Route::post('/login', 'authenticate');
    });


    Route::post('/logout', 'logout')->name('logout');
});
