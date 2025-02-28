@extends('layouts.layout')
@section('content')
    @auth
    @can('create', App\Models\Blog::class)




        <div class="container mx-auto px-6">
            <div class="max-w-2xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-yellow-300 text-2xl font-bold">Upload the News</h2>
                <form class="flex flex-col gap-4 text-white " action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <label for="title">News Title</label>
                    <input
                        class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="text" name="title" id="title">
                    @error('title')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <label for="body">News Body</label>
                    <textarea
                        class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        name="body" id="body">
        </textarea>
                    @error('body')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <label for="image">News Image</label>
                    <input
                        class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="file" name="image" id="image">
                    @error('image')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
                        Upload
                    </button>
                </form>
            </div>
        </div>
        @endcan
    @endauth
@endsection
