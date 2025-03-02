@extends('layouts.layout')
@section('content')
<div class="text-center">
    <h1 class="text-2xl font-bold text-yellow-300 mb-4">Welcome to the DISPELS Authority Dashboard</h1>
    <p class="text-gray-400 mb-6">Lorem</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-md mx-auto">
        <a href="{{ route('admin.blogs') }}" class="block">
            <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300">
                📰 Manage News & Blogs
            </button>
        </a>

        <a href="{{ route('admin.teams') }}" class="block">
            <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300">
                🏆 Manage Teams
            </button>
        </a>
        <a href="{{ route('admin.tournaments') }}" class="block">
            <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300">
                🏆 Manage Tournaments
            </button>
        </a>
    </div>
</div>
@endsection

