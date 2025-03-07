@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-yellow-300 mb-6">Create Player</h2>

        <!-- Form Start -->
        <div class="bg-gray-800 p-6 rounded-md shadow-md max-w-2xl mx-auto">
            <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-4">
                @csrf

                <!-- Player Name -->
                <label class="text-white font-semibold" for="name">Gamer Tag</label>
                <input type="text" name="gamertag" id="gamertag"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    placeholder="Frequently used Gaming Name">
                @error('gamertag')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <!-- Phone -->
                <label class="text-white font-semibold" for="phone">Phone</label>
                <input type="text" name="phone" id="phone"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    placeholder="Enter Phone Number">
                @error('phone')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <!-- Game Selection -->
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
                <!-- Role Selection -->
                <label class="text-white font-semibold" for="position_id">Select Position</label>
                <select name="position_id" id="position_id" value="position_id"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300">
                    <option value="" disabled selected>Select a game first</option>
                </select>
                @error('position_id')
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
                <button type="submit"
                    class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
                    Create Player
                </button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gameSelect = document.getElementById('game_id');
            const positionSelect = document.getElementById('position_id');
            const gamePositions = @json($games); // Pass game data as JSON

            gameSelect.addEventListener('change', function() {
                positionSelect.innerHTML =
                    '<option value="" disabled selected>Select a preferred position</option>'; // Reset roles
                const selectedGameId = this.value;
                const selectedGame = gamePositions.find(game => game.id == selectedGameId);

                if (selectedGame) {
                    selectedGame.positions.forEach(position => {
                        let option = new Option(position.name, position.id);
                        positionSelect.add(option);
                    });
                }
            });
        });
    </script>
@endsection
