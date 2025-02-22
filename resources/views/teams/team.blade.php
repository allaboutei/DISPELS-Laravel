@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-yellow-300 mb-5">Teams</h2>
    <p class="text-gray-400 mb-2">This is our teams</p>

    <!-- Search Bar -->
    <div class="mb-6">
        <input type="text" id="search" placeholder="Search teams..."
            class="w-full p-3 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
    </div>

    <!-- Teams Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

@include('shared.team-card')

    </div>
</div>

<script>
    // Search Functionality
    document.getElementById('search').addEventListener('input', function() {
        let searchText = this.value.toLowerCase();
        document.querySelectorAll('.grid div').forEach(card => {
            let name = card.querySelector('h2').innerText.toLowerCase();
            card.style.display = name.includes(searchText) ? 'block' : 'none';
        });
    });
</script>
@endsection
