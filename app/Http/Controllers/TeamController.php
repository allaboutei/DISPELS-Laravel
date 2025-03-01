<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function index(){
        return view('teams.team',[
            'teams'=>Team::latest()->get()
        ]);
    }
    public function store(){
        $validated =request()->validate([
            'name' => 'required|min:5|max:40',
            'phone' => 'required |min:5|max:20',
            'email' => 'required|email',
            'game_id' => 'required',
            'logo' => 'nullable|image'
        ]);

        if (request()->hasFile('logo')) {
            $imagePath = request()->file('logo')->store('team', 'public');
            $validated['logo'] = $imagePath;


        }
         Team::create($validated);
         return redirect()->route('teams')->with([
            'status' => 'success',
            'message' => 'Successfully created a team'
        ]);
    }
}
