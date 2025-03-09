<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index()
    {
        return view('admins.dashboard');
    }

    public function create_blog()
    {
        return view('admins.blogs.create-blog');
    }

    public function create_team()
    {
        $games = Game::all();
        return view('admins.teams.create-team', compact('games'));
    }

    public function create_tournament()
    {
        $games = Game::all();
        return view('admins.tournaments.create-tournament', compact('games'));
    }

    public function index_user()
    {
        $users = User::all();
        return view('admins.users.manage_user', compact('users'));
    }
}
