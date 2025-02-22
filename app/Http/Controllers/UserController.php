<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // public function index()
    // {

    // }


    use AuthorizesRequests;
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);
$editing=true;
        return view('users.show', compact('user','editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
        $this->authorize('update',$user);
        $validated=request()->validate([
            'name'=>'required|min:5|max:100',
            'image'=>'nullable|image'
        ]);
// dd($validated);
if( request()->has('image')){
    $imagePath=request('image')->file('image')->store('profile','public');
    $validated['image']=$imagePath;
}

        $user->update($validated);
        return redirect(route('users.show',Auth::user()->id));
    }

    /**
     * Remove the specified resource from storage.
     */
}
