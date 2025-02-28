 <!-- Player Card 1 -->
 <div class="bg-gray-800 p-4 rounded-lg shadow-lg text-center">
    <img src="{{ $player->user->getImageURL() }}" alt="Player 1" class="w-24 h-24 rounded-full mx-auto mb-3">
    <h2 class="text-lg font-semibold text-white">{{$player->gamertag}}</h2>
    <p class="text-sm text-gray-400">Team : Not Implemented</p>
    <p class="text-xs text-red-400 font-semibold">Role: {{$player->role->name}}</p>
    <a href="{{ route('users.show', $player->user_id) }}" class="mt-4 inline-block bg-red-600 hover:bg-red-500 text-white py-2 px-4 rounded-lg">View Profile</a>
</div>



