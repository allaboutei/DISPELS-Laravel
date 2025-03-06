@extends('layouts.layout')
@section('content')
    @auth

        <div class="container mx-auto px-6">
            <div class="max-w-2xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-yellow-300 text-2xl font-bold">Create a tournament</h2>
                <form class="flex flex-col gap-4 text-white " action="{{ route('tournaments.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

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

                    <label class="text-white font-semibold" for="name">Tournament Name</label>
                    <input
                        class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="text" name="name" id="name">
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <label class="text-white font-semibold" for="info">Tournament Information</label>
                    <textarea
                        class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        name="info" id="info">
                        </textarea>
                    @error('info')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <label class="text-white font-semibold" for="price">Pricepool</label>
                    <input
                        class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="number" name="price" id="price">
                    @error('price')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <label class="text-white font-semibold" for="location">Location</label>
                    <input
                        class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="text" name="location" id="location">
                    @error('location')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <label class="text-white font-semibold" for="start">Start Date</label>
                    <input
                        class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="date" name="start" id="start">
                    @error('start')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <label class="text-white font-semibold" for="end">End Date</label>
                    <input
                        class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="date" name="end" id="end">
                    @error('end')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror



                    <label class="text-white font-semibold" for="image">Tournament Image</label>
                    <input
                        class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="file" name="image" id="image">
                    @error('image')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror



                    <button class="btn-yellow">
                        Upload
                    </button>
                </form>
            </div>
        </div>

    @endauth
@endsection
