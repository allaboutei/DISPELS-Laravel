@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold text-yellow-300 mb-5">Tournaments</h2>

        <!-- Tournaments Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($tournaments as $tournament)
                @include('shared.tournament-card')
            @empty
            @endforelse




        </div>
    </div>
@endsection
