<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if ($editing ?? false)
    <div class="bg-black rounded-sm  ">
        <form class="flex flex-col gap-4 p-10 text-white " action="{{ route('blogs.update', $blog->id) }}" method="post">
            @csrf
@method('put')
            <label for="title">News Title</label>
            <input
                class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                type="text" name="title" id="title" value="{{ $blog->title }}">
            @error('title')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror

            <label for="body">News Body</label>
            <textarea class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                name="body" id="body">{{ $blog->body }}</textarea>
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
                Update
            </button>
        </form>
    </div>
    @else
        <img class="w-full h-56 object-cover" src="{{ asset('images/news1.png') }}" alt="Blog Image">
        <div class="p-6">
            <p class="text-gray-500 text-sm">{{ $blog->created_at->format('j M, g:i A') }}
                <span class="font-semibold">{{$blog->user->name}}</span></p>
            <h3 class="text-lg font-semibold mt-2">{{ $blog->title }}</h3>
            <p class="text-sm  mt-2">{{ $blog->body }}</p>
            <div class="flex flex-row gap-5">
                <a href="{{ route('blogs.show', $blog->id) }}"> <button
                    class="bg-blue-500 mt-2 px-5 py-2 rounded-md ">Show More</button> </a>

@auth
<a href="{{ route('blogs.edit', $blog->id) }}">
    <button class="bg-blue-500 mt-2 px-5 py-2 rounded-md ">Edit</button>
</a>
<form action="{{ route('blogs.destroy', $blog) }}" method="post">
    @csrf
    @method('delete')


    <button class="bg-red-500 mt-2 px-5 py-2 rounded-md ">Delete</button>

</form>
@endauth

            </div>
        </div>

        @include('blogs.like')
    @endif


</div>

