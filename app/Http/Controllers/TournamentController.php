<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    //
    public function index()
    {
        return view('tournaments.tournament',[
            'tournaments'=>Tournament::latest()->paginate(4)
        ]);
    }

    public function store()
    {

        $validated = request()->validate([
            'game_id' => 'required',
            'name' => 'required|max:300|min:10',
            'info' => 'required|max:300|min:10',
            'price' => 'required',
            'location' => 'required',
            'start' => 'required|date|after_or_equal:today',
            'end' => 'required|date|after_or_equal:start',
            'image' => 'image|nullable',

        ]);
        // dd($validated);
        if(request()->hasFile('image')){
            $imagePath=request()->file('image')->store('tour','public');
            $validated['image']=$imagePath;
        }
        Tournament::create($validated);
        return redirect()->route('tournaments')->with([
            'status' => 'success',
            'message' => 'Tournament created successfully'
        ]);
    }
}
