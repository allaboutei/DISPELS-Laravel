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
        return view('players.player',[
            'players' => Player::with('role')->latest()->get()
        ]);
    }
    public function join(User $user)
    {
        $this->authorize('create', Player::class);
        $games = Game::with('roles')->get();
        return view('players.create-player', compact('games'));
    }
    public function store()
    {
        $validated = request()->validate([
            'gamertag' => 'required|min:5|max:50',
            'phone' => 'required|min:5|max:15',
            'game_id' => 'required',
            'role_id' => 'required',
            'image' => 'nullable|image',
        ]);
        $validated['user_id'] = Auth::user()->id;
        $validated['email'] = Auth::user()->email;
        $validated['name'] = Auth::user()->name;
        // dd($validated);

        Player::create($validated);
        return redirect()->route('players')->with([
            'status' => 'success',
            'message' => 'Successfully enrolled as a player'
        ]);
    }
}
