@extends('layouts.layout')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-900 text-white px-5">

    <div class="flex flex-col lg:flex-row items-center gap-10 bg-black px-8 py-6 rounded-lg shadow-lg w-full max-w-4xl">

        <!-- Registration Banner (Hidden on small screens) -->
        <div class="hidden lg:block w-1/3">
            <img class="w-full rounded-lg" src="{{ asset('images/DISPELS.jpg') }}" alt="Register Banner">
        </div>

        <!-- Registration Form Section -->
        <div class="flex flex-col gap-6 w-full lg:w-2/3 max-w-lg">
            <h2 class="text-yellow-300 text-2xl font-bold">Register</h2>
            <p class="text-yellow-300">Create your account</p>

            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <!-- Username -->
                <div class="flex flex-col">
                    <label for="username" class="text-sm">User Name</label>
                    <input class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300 w-full"
                           id="username" type="text" name="username" placeholder="Username" required>
                </div>

                <!-- Email -->
                <div class="flex flex-col">
                    <label for="email" class="text-sm">Email</label>
                    <input class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300 w-full"
                           id="email" type="email" name="email" placeholder="your@email.com" required>
                </div>

                <!-- Password -->
                <div class="flex flex-col">
                    <label for="password" class="text-sm">Password</label>
                    <input class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300 w-full"
                           id="password" type="password" name="password" placeholder="••••••••" required>
                </div>

                <!-- Confirm Password -->
                <div class="flex flex-col">
                    <label for="password_confirmation" class="text-sm">Confirm Password</label>
                    <input class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300 w-full"
                           id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required>
                </div>

                <!-- Register Button -->
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
                    Register
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-sm text-gray-400">
                <span>Already a user?</span>
                <a href="{{ route('login') }}" class="text-yellow-400 hover:underline">Login Here</a>
            </div>
        </div>

    </div>
</div>
@endsection
