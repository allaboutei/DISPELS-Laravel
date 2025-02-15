<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('', [DashboardController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news');

// Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::post('/news', [NewsController::class, 'store'])->name('news.store');

Route::delete('/news/{new}', [NewsController::class, 'destroy'])->name('news.destroy');

Route::get('/show-create-news', function () {
    return view('admins.news.create-news');
})->name('show-create-news');



Route::controller(AuthController::class)->group(function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', 'register')->name('register');

        Route::post('/register', 'store');

        Route::get('/login', 'login')->name('login');

        Route::post('/login', 'authenticate');
    });


    Route::post('/logout', 'logout')->name('logout');
});
