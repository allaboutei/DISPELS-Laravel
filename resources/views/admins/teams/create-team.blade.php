@extends('layouts.layout')

@section('content')
@auth

    <div class="container mx-auto px-6">
        <div class="max-w-2xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-yellow-300 text-2xl font-bold">Create the Team</h2>
            <form class="flex flex-col gap-4 text-white " action="{{route('teams.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <label class="text-white font-semibold" for="name">Team Name</label>
                <input
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                    type="text" name="name" id="name">
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <label class="text-white font-semibold" for="phone">Contact Number</label>
                <input type="text" name="phone" id="phone"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    placeholder="Enter Phone Number">
                @error('phone')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <label class="text-white font-semibold" for="email">Team Email</label>
                <input type="email"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                    name="email" id="email">

                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <label class="text-white font-semibold" for="image">Team Logo</label>
                <input
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                    type="file" name="logo" id="logo">
                @error('logo')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <label class="text-white font-semibold" for="game_id">Select Game</label>
                <select name="game_id" id="game_id"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300">
                    <option value="" disabled selected>Select a game</option>
                    @foreach ($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
                @error('game_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <button class="btn-yellow">
                    Create
                </button>
            </form>
        </div>
    </div>

    @endauth
@endsection
