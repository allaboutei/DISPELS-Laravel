


<div class="bg-gray-800 p-4 rounded-lg shadow-lg text-center">
    <!-- Game SVG -->
    <img src="{{ $team->game->getImageURL() }}" alt="{{ $team->game->name }}" class="w-12 h-12 mb-3 mx-auto ">

    <!-- Team Logo -->
    <img src="{{ $team->getImageURL() }}" alt="{{ $team->name }}" class="w-24 h-25 mx-auto mb-3">

    <!-- Team Name -->
    <h2 class="text-lg font-semibold text-white">{{ $team->name }}</h2>

    <!-- Captain Info -->
    <p class="text-sm text-gray-400">Captain: Not Implemented</p>

    <!-- Wins/Losses -->
    <p class="text-xs text-red-400 font-semibold">Win Loss Not Implemented</p>

    <!-- View Team Button -->
    <a href="#" class="mt-4 inline-block bg-red-600 hover:bg-red-500 text-white py-2 px-4 rounded-lg">View Team</a>
</div>



