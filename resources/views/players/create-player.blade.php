@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-yellow-300 mb-6">Create Player</h2>

        <!-- Form Start -->
        <div class="bg-gray-800 p-6 rounded-md shadow-md max-w-2xl mx-auto">
            <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf

                <!-- Player Name -->
                <label class="text-white font-semibold" for="name">Gamer Tag</label>
                <input type="text" name="gamertag" id="gamertag"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    placeholder="Frequently used Gaming Name" required>
                @error('gamertag')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <!-- Phone -->
                <label class="text-white font-semibold" for="phone">Phone</label>
                <input type="number" name="phone" id="phone"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    placeholder="Enter Phone Number" required>
                @error('phone')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <!-- Game Selection -->
                <label class="text-white font-semibold" for="game_id">Select Game</label>
                <select name="game_id" id="game_id"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    required>
                    <option value="" disabled selected>Select a game</option>
                    @foreach ($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>

                <!-- Role Selection -->
                <label class="text-white font-semibold" for="role_id">Select Position</label>
                <select name="role_id" id="role_id"
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    required>
                    <option value="" disabled selected>Select a game first</option>
                </select>




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
            const roleSelect = document.getElementById('role_id');
            const gameRoles = @json($games); // Pass game data as JSON

            gameSelect.addEventListener('change', function() {
                roleSelect.innerHTML =
                '<option value="" disabled selected>Select a role</option>'; // Reset roles
                const selectedGameId = this.value;
                const selectedGame = gameRoles.find(game => game.id == selectedGameId);

                if (selectedGame) {
                    selectedGame.roles.forEach(role => {
                        let option = new Option(role.name, role.id);
                        roleSelect.add(option);
                    });
                }
            });
        });
    </script>
@endsection
