<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    //
    use AuthorizesRequests;
    public function index()
    {
        return view('players.player');
    }
    public function join(User $user)
    {
        $this->authorize('create', Player::class);
        $games = Game::with('roles')->get();
        return view('players.create-player', compact('games'));
    }
    public function store(User $user)
    {
        $validated = request()->validate([
            'gamertag' => 'required|min:5|max:50',
            'body' => 'required |min:2|max:1000',
        ]);
    }
}
