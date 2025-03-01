@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-2 py-10">
    <!-- Welcome Message -->
    @auth
        <p class="text-2xl font-semibold text-yellow-300 text-center">
            Welcome back to <span class="text-red-500">DISPELS</span>,
            <span class="text-green-300">{{ Auth::user()->name }}</span>!
        </p>
    @endauth

    @guest
        <p class="text-2xl font-semibold text-yellow-300 text-center">
            Welcome to <span class="text-red-500">DISPELS</span> – The Ultimate Gaming Arena!
        </p>
    @endguest

    <!-- Carousel -->
    <div class="relative w-full max-w-4xl mx-auto mt-8">
        <div id="carousel" class="relative w-full overflow-hidden rounded-lg shadow-lg">
            <div class="carousel-inner flex transition-transform duration-500 ease-in-out">
                @foreach ($games as $game)
                <div class="carousel-item w-full flex-shrink-0">
                    <!-- Game Image -->
                    <img src="{{ $game->getImageURL() }}" class="mx-auto w-1/4  object-contain rounded-lg" alt="{{ $game->name }}">

                    <!-- Game Info -->
                    <div class="text-center mt-4">
                        <h2 class="text-xl font-bold text-white">{{ $game->name }}</h2>
                        <p class="text-gray-300 text-sm">{{ $game->desc }}</p>
                    </div>

                    <!-- Top Teams -->
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-yellow-300 text-center">Top Teams</h3>
                        <div class="flex justify-center gap-4 mt-2">
                            @foreach ($game->teams->take(3) as $team)
                            <div class="bg-gray-800 p-3 rounded-lg shadow-md w-40 text-center">
                                <img src="{{ $team->getImageURL() }}" class="w-16 h-18 mx-auto">
                                <p class="text-sm font-semibold text-white">{{ $team->name }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Featured Tournaments -->
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-green-400 text-center">Featured Tournaments</h3>
                        <div class="flex justify-center gap-4 mt-2">

                            <div class="bg-gray-800 p-3 rounded-lg shadow-md w-48 text-center">
                                <h4 class="text-sm font-semibold text-white">Name</h4>
                                <p class="text-xs text-gray-400">Prize Pool: $10000</p>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Carousel Controls -->
        <button id="prevBtn"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-2 rounded-l">
            &#10094;
        </button>
        <button id="nextBtn"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-2 rounded-r">
            &#10095;
        </button>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-10">

        @guest
            <a href="{{ route('register') }}"
                class="bg-green-400 hover:bg-green-500 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition">
                Join Now
            </a>
        @endguest
    </div>
</div>

<!-- Carousel Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.querySelector('.carousel-inner');
        const items = document.querySelectorAll('.carousel-item');
        let index = 0;

        function showSlide(i) {
            carousel.style.transform = `translateX(-${i * 100}%)`;
        }

        document.getElementById('prevBtn').addEventListener('click', function() {
            index = (index > 0) ? index - 1 : items.length - 1;
            showSlide(index);
        });

        document.getElementById('nextBtn').addEventListener('click', function() {
            index = (index < items.length - 1) ? index + 1 : 0;
            showSlide(index);
        });

        setInterval(() => {
            index = (index + 1) % items.length;
            showSlide(index);
        }, 5000);
    });
</script>

@endsection
