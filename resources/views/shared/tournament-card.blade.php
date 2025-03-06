<div class="bg-gray-800 rounded-lg shadow-lg p-4">
    <img src="{{ $tournament->game->getImageURL() }}" alt="{{ $tournament->game->name }}" class="w-12 h-12 mb-3 mx-auto ">
    <img src="{{ $tournament->getImageURL() }}" alt="Tournament Image"
        class="w-full h-40 object-cover rounded-md mb-4">
    <h3 class="text-xl font-semibold text-white">{{$tournament->name}}</h3>
    <p class="text-gray-400 text-sm">Prize Pool: {{$tournament->price}} USD</p>
    <p class="text-gray-400 text-sm">Date: {{$tournament->start->format('F t, o')}}</p>
    <a href="#" class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
        View Details
    </a>
</div>
