<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogLikeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminOrOrganizer;
use Illuminate\Support\Facades\Route;

Route::get('', [DashboardController::class, 'index'])->name('home');

Route::get('/games', [GameController::class, 'index'])->name('games');

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

Route::resource('users', UserController::class)->only('show', 'edit', 'delete', 'update')->middleware(['auth']);

Route::get('/players', [PlayerController::class, 'index'])->name('players');

Route::get('/players/join', [PlayerController::class, 'join'])->name('players.join')->middleware('auth');

Route::post('/players/create', [PlayerController::class, 'store'])->name('players.store')->middleware(['auth']);


Route::get('/teams', [TeamController::class, 'index'])->name('teams');
Route::post('/teams/create', [TeamController::class, 'store'])->name('teams.store')->middleware(['auth']);

Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments');
Route::post('/tournaments/create', [TournamentController::class, 'store'])->name('tournaments.store')->middleware(['auth']);

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth','admin']);

Route::get('/admin/blogs', [AdminDashboardController::class, 'create_blog'])->name('admin.blogs')->middleware(['auth','admin']);
Route::get('/admin/teams', [AdminDashboardController::class, 'create_team'])->name('admin.teams')->middleware(['auth','admin']);
Route::get('/admin/tournaments', [AdminDashboardController::class, 'create_tournament'])->name('admin.tournaments')->middleware(['auth','admin']);

Route::get('/admin/users', [AdminDashboardController::class, 'index_user'])->name('admin.users')->middleware(['auth','admin']);


Route::controller(AuthController::class)->group(function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', 'register')->name('register');

        Route::post('/register', 'store');

        Route::get('/login', 'login')->name('login');

        Route::post('/login', 'authenticate');
    });


    Route::post('/logout', 'logout')->name('logout');
});
