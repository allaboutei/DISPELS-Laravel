@extends('layouts.layout')
@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">From the News</h2>
            <p class="text-gray-500 mt-2">Learn how to grow your business with our expert advice.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <!-- Blog Card 1 -->
            @forelse ($blogs as $blog)

               @include('blogs.blog-card')
@empty
<p class="text-center mb-8 text-yellow-300" >No Recent News Available</p>
            @endforelse



        </div>
        {{ $blogs->withQueryString()->links() }}

    </div>
@endsection
