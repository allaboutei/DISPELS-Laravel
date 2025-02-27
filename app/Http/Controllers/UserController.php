<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $this->authorize('update', $user);
        $editing = true;
        return view('users.show', compact('user', 'editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $this->authorize('update', $user);

        $validated = request()->validate([
            'name' => 'required|min:5|max:100',
            'image' => 'nullable|image'
        ]);

        // Debug to check if validated data exists
        // dd($validated);

        if (request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            // Optional: Delete old image if needed
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }

       $user->update($validated);

        return redirect(route('users.show', $user->id))->with([
            'status' => 'success',
            'message' => 'Profile successfully updated'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
}
