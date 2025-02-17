@extends('layouts.layout')

@section('content')
    <div class="max-w-5xl mx-auto px-4">
        <!-- Page Heading -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">News</h2>
            <p class="text-gray-400 mt-2">Learn how to grow your business with our expert advice.</p>
        </div>

        <!-- Blog Posts -->
        <div class="flex flex-col gap-5 w-full">
            @forelse ($blogs as $blog)
                @include('blogs.blog-card')
            @empty
                <p class="text-center text-lg text-yellow-300 bg-gray-800 p-4 rounded-lg">
                    No Recent News Available
                </p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center text-black">
            {{ $blogs->withQueryString()->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
