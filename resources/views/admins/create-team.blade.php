@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-6">
        <div class="max-w-2xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-yellow-300 mb-4">Create a New Team</h2>

            @if (session('status'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <!-- Team Name -->

                    <label for="name" class="block text-white font-semibold">Team Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                        placeholder="Enter team name" required>
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror


                <!-- Team Logo -->

                    <label for="logo" class="block text-white font-semibold">Team Logo</label>
                    <input type="file" name="logo" id="logo"
                        class="w-full bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300">
                    @error('logo')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror


                <!-- Select Game -->
                <select name="game_id" id="game_id"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300">
                    <option value="" disabled selected>Select a game</option>

                </select>
                @error('game_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

                <!-- Submit Button -->

                    <button type="submit"
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded">
                        Create Team
                    </button>

            </form>
        </div>
    </div>
@endsection
