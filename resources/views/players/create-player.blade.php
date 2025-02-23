@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-6">
    <h2 class="text-3xl font-bold text-yellow-300 mb-6">Create Player</h2>

    <!-- Form Start -->
    <div class="bg-gray-800 p-6 rounded-md shadow-md max-w-2xl mx-auto">
        <form action="#" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf

            <!-- Player Name -->
            <label class="text-white font-semibold" for="name">Player Name</label>
            <input type="text" name="name" id="name"
                   class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                   placeholder="Enter player name" required>
            @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            <!-- Email -->
            <label class="text-white font-semibold" for="email">Email</label>
            <input type="email" name="email" id="email"
                   class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                   placeholder="Enter email" required>
            @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            <!-- Game Selection -->
            <label class="text-white font-semibold" for="game_id">Select Game</label>
            <select name="game_id" id="game_id"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300" required>
                <option value="" disabled selected>Select a game</option>
                @foreach ($games as $game)
                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                @endforeach
            </select>
            @error('game_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            <!-- Profile Image -->
            <label class="text-white font-semibold" for="image">Profile Image</label>
            <input type="file" name="image" id="image"
                   class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300">
            @error('image')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            <!-- Submit Button -->
            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
                Create Player
            </button>
        </form>
    </div>
</div>
@endsection
