<!-- Team Card 1 -->
<div class="bg-gray-800 p-4 rounded-lg shadow-lg text-center">
    <img src="{{ $team->getImageURL() }}" alt="Team 1" class="w-24 h-24 rounded-full mx-auto mb-3">
    <h2 class="text-lg font-semibold text-white">{{$team->name}}</h2>
    <p class="text-sm text-gray-400">Captain: Not Implemented</p>
    <p class="text-xs text-red-400 font-semibold">Win Loss Not Implemented</p>
    <a href="#" class="mt-4 inline-block bg-red-600 hover:bg-red-500 text-white py-2 px-4 rounded-lg">View Team</a>
</div>

<!-- Team Card 2 -->
<div class="bg-gray-800 p-4 rounded-lg shadow-lg text-center">
    <img src="{{ asset('images/DISPELS.jpg') }}" alt="Team 2" class="w-24 h-24 rounded-full mx-auto mb-3">
    <h2 class="text-lg font-semibold text-white">Dire Wolves</h2>
    <p class="text-sm text-gray-400">Captain: Alice "Crystal Maiden" Smith</p>
    <p class="text-xs text-red-400 font-semibold">Wins: 20 | Losses: 10</p>
    <a href="#" class="mt-4 inline-block bg-red-600 hover:bg-red-500 text-white py-2 px-4 rounded-lg">View Team</a>
</div>


