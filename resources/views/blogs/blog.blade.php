@extends('layouts.layout')

@section('content')
    <!-- Page Heading -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-yellow-300">News</h2>
        <p class="text-gray-400 mt-2">Learn how to grow your business with our expert advice.</p>
    </div>



        @forelse ($blogs as $blog)
            @include('shared.blog-card')
            <br>
        @empty
            <p class="text-center text-lg text-yellow-300 bg-gray-800 p-4 rounded-lg">
                No Recent News Available
            </p>
        @endforelse

    <!-- Pagination -->
    <div class="mt-8 flex justify-center  text-black">
        {{ $blogs->withQueryString()->links('pagination::tailwind') }}
    </div>
@endsection
