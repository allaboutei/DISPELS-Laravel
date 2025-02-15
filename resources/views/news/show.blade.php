@extends('layouts.layout')
@section('content')
<div class="max-w-6xl mx-auto">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900">From the blog</h2>
        <p class="text-gray-500 mt-2">Learn how to grow your business with our expert advice.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        <!-- Blog Card 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-56 object-cover" src="{{ asset('images/news1.png') }}" alt="Blog Image">
            <div class="p-6">
                <p class="text-gray-500 text-sm">Mar 16, 2020 · <span class="font-semibold">Michael Foster</span></p>
                <h3 class="text-lg font-semibold mt-2">Boost your conversion rate</h3>
            </div>
        </div>

        <!-- Blog Card 2 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-56 object-cover" src="{{ asset('images/news2.png') }}" alt="Blog Image">
            <div class="p-6">
                <p class="text-gray-500 text-sm">Mar 10, 2020 · <span class="font-semibold">Lindsay Walton</span></p>
                <h3 class="text-lg font-semibold mt-2">How to use search engine optimization to drive sales</h3>
            </div>
        </div>

        <!-- Blog Card 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-56 object-cover" src="{{ asset('images/news3.png') }}" alt="Blog Image">
            <div class="p-6">
                <p class="text-gray-500 text-sm">Feb 12, 2020 · <span class="font-semibold">Tom Cook</span></p>
                <h3 class="text-lg font-semibold mt-2">Improve your customer experience</h3>
            </div>
        </div>

        <!-- Blog Card 4 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-56 object-cover" src="{{ asset('images/news4.png') }}" alt="Blog Image">
            <div class="p-6">
                <p class="text-gray-500 text-sm">Feb 12, 2020 · <span class="font-semibold">Tom Cook</span></p>
                <h3 class="text-lg font-semibold mt-2">Improve your customer experience</h3>
            </div>
        </div>
    </div>
</div>

@endsection
