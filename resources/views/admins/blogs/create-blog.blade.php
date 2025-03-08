@extends('layouts.layout')
@section('content')
    @auth

            <div class="container mx-auto px-6">
                <div class="max-w-2xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-yellow-300 text-2xl font-bold">Upload the News</h2>
                    <form class="flex flex-col gap-4 text-white " action="{{ route('blogs.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <label class="text-white font-semibold" for="title">News Title</label>
                        <input
                            class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                            type="text" name="title" id="title">
                        @error('title')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror

                        <label class="text-white font-semibold" for="body">News Body</label>
                        <textarea
                            class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                            name="body" id="body">
                        </textarea>
                        @error('body')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror

                        <label class="text-white font-semibold" for="image">News Image</label>
                        <input
                            class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                            type="file" name="image" id="image">
                        @error('image')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror

                        <button class="btn-yellow">
                            Upload
                        </button>
                    </form>
                </div>
            </div>
       
    @endauth
@endsection
