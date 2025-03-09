@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-6">
        <div class="flex flex-row justify-between items-center mb-10">
            <div>
                <h2 class="text-3xl font-bold text-yellow-300">Players</h2>
                <p class="text-gray-400 mb-2">This is our registered players</p>
            </div>

            @auth

                @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('organizer'))
                @else
                    @php
                        $is_player = \App\Models\Player::where('user_id', auth()->id())->first();
                    @endphp

                    @if ($is_player)
                        <div>
                            <span>You are already registered as a player!</span>
                            <a class="btn-blue ml-5" href="{{ route('users.show', Auth::user()->id) }}">Go to Profile</a>
                        </div>
                    @else
                        <div>
                            <span>Ready to join the teams and compete in exciting matches?</span>
                            <a class="btn-blue ml-5" href="{{ route('players.join') }}">Fill Form</a>
                        </div>
                    @endif
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
            @forelse ($players as $player)
                @include('shared.player-card')
            @empty
                <p>No Player Found</p>
            @endforelse

        </div>
    </div>
@endsection
