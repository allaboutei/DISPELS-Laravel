@extends('layouts.layout')
@section('content')
<div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-yellow-400 text-center mb-6">Explore Games</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($games as $game)
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:scale-105 transition">
                <img src="{{$game->getImageURL()}}" alt="Dota 2" class="w-24 h-24 mx-auto mb-4 shadow-md">
                <h2 class="text-xl font-semibold text-center">{{$game->name}}</h2>
                <p class="text-gray-400 text-sm text-center">{{$game->desc}}</p>
                <div class="mt-4 text-center">
                    <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold py-2 px-4 rounded">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach







        </div>
    </div>
@endsection
