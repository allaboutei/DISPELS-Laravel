@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold text-yellow-300 mb-5">Tournaments</h2>

        <!-- Tournaments Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Sample Tournament Card -->
            <div class="bg-gray-800 rounded-lg shadow-lg p-4">
                <img src="{{ asset('images/tournament1.jpg') }}" alt="Tournament Image"
                    class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-xl font-semibold text-white">Dota 2 Championship</h3>
                <p class="text-gray-400 text-sm">Prize Pool: $500,000</p>
                <p class="text-gray-400 text-sm">Date: March 15, 2025</p>
                <a href="#" class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                    View Details
                </a>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-lg p-4">
                <img src="{{ asset('images/tournament2.jpg') }}" alt="Tournament Image"
                    class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-xl font-semibold text-white">CS:GO Masters</h3>
                <p class="text-gray-400 text-sm">Prize Pool: $250,000</p>
                <p class="text-gray-400 text-sm">Date: April 10, 2025</p>
                <a href="#" class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                    View Details
                </a>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-lg p-4">
                <img src="{{ asset('images/tournament3.jpg') }}" alt="Tournament Image"
                    class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-xl font-semibold text-white">Valorant Invitational</h3>
                <p class="text-gray-400 text-sm">Prize Pool: $300,000</p>
                <p class="text-gray-400 text-sm">Date: May 20, 2025</p>
                <a href="#" class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                    View Details
                </a>
            </div>
        </div>
    </div>
@endsection
