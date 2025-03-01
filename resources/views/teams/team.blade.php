@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-yellow-300 mb-5">Teams</h2>
    <p class="text-gray-400 mb-2">This is our teams</p>




    <!-- Teams Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($teams as $team)
        @include('shared.team-card')
@empty
<p>No Team Found</p>
@endforelse


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
