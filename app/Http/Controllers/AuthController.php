<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:5',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Mail::to($user->email)
        // ->cc()
        // ->bcc()
            ->send(new WelcomeEmail($user));

        return redirect()->route('dashboard')->with('success', 'Account created successfully');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);


        if (Auth::attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in success');
        }


        return redirect()->route('login')->withErrors([
            'email' => 'The email or password is incorrect',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success', 'Logged out success');
    }
}
