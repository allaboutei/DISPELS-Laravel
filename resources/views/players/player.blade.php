@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-6">
        <div class="flex flex-row justify-between items-center mb-10">
            <div>
                <h2 class="text-3xl font-bold text-yellow-300">Players</h2>
                <p class="text-gray-400 mb-2">This is our players</p>
            </div>


            @auth
                @if (!auth()->user()->is_admin && !auth()->user()->is_host)
                    <div>
                        <span>Ready to join the teams and compete in exciting matches?</span>
                        <a class="btn-blue ml-5" href="{{ route('players.join') }}">Fill Form</a>
                    </div>
                @endif
            @endauth

            @guest
                <div>
                    <span>Sign up or log in to join teams and compete in exciting matches!</span>
                    <a class="btn-yellow ml-5" href="{{ route('login') }}">Login</a>
                </div>
            @endguest

        </div>

        <!-- Players Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @include('shared.player-card')
        </div>
    </div>
@endsection
