@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-900 text-white px-5">

        <div class="flex flex-col lg:flex-row items-center gap-10 bg-black px-8 py-6 rounded-lg shadow-lg">

            <!-- Login Banner (Hidden on smaller screens) -->
            <div class="hidden lg:block">
                <img class="w-60 rounded-lg" src="{{ asset('images/DISPELS.jpg') }}" alt="Login Banner">
            </div>

            <!-- Login Form Section -->
            <div class="flex flex-col gap-6">
                <h2 class="text-yellow-300 text-2xl font-bold">Welcome Back</h2>
                <p class="text-yellow-300">Login to access your eSports profile and participate in tournaments.</p>

                <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4 ">
                    @csrf


                    <div class="flex flex-col">
                        <label for="email" class="text-sm mb-2">Email</label>
                        <input
                            class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                            name="email" id="email" type="email" placeholder="example@email.com" >
                            @error('email')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="flex flex-col">
                        <label for="password" class="text-sm mb-2">Password</label>
                        <input
                            class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                            name="password" id="password" type="password" placeholder="••••••••" >
                            @error('password')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>


                    <button class="bg-yellow-300 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
                        Login
                    </button>
                </form>

                <!-- Register Link -->
                <div class="text-sm text-gray-400">
                    <span>Don't have an account?</span>
                    <a href="{{ route('register') }}" class="text-yellow-400 hover:underline">Create an account</a>
                </div>
            </div>

        </div>
    </div>
@endsection
