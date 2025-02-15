@extends('layouts.layout')
@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">From the blog</h2>
            <p class="text-gray-500 mt-2">Learn how to grow your business with our expert advice.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <!-- Blog Card 1 -->
            @foreach ($news as $new)

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img class="w-full h-56 object-cover" src="{{ asset('images/news1.png') }}" alt="Blog Image">
                    <div class="p-6">
                        <p class="text-gray-500 text-sm">{{ $new->created_at }} <span class="font-semibold">Michael
                                Foster</span></p>
                        <h3 class="text-lg font-semibold mt-2">{{ $new->title }}</h3>
                        <form action="{{route('news.destroy',$new)}}" method="post">
                            @csrf
                            @method('delete')
                        <button class="bg-red-500 mt-2 px-5 py-2 rounded-full ">X</button>
                    </form>
                    </div>
                </div>

            @endforeach



        </div>
        {{ $news->links() }}

    </div>
@endsection
