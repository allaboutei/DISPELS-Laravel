<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admins.dashboard');
    }
    public function create_blog()
    {

        return view('admins.create-blog');
    }
    public function create_team()
    {
        $games = Game::get();
        return view('admins.create-team', compact('games'));
    }

    public function create_tournament()
    {
        $games = Game::all();
        return view('admins.create-tournament', compact('games'));
    }
    public function manage_user()
    {
        $users = User::get();
        return view('admins.users.manage_user', compact('users'));
    }
}
