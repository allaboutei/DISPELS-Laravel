<div class="w-full bg-gray-800 shadow-md rounded-md overflow-hidden">
    @if ($editing ?? false)
        <div class="bg-black p-5 rounded-md">
            <form class="flex flex-col gap-4 text-white" action="{{ route('blogs.update', $blog->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <label for="title" class="font-semibold">News Title</label>
                <input
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    type="text" name="title" id="title" value="{{ $blog->title }}">
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <label for="body" class="font-semibold">News Body</label>
                <textarea class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    name="body" id="body">{{ $blog->body }}</textarea>
                @error('body')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <label for="image" class="font-semibold">News Image</label>
                <input
                    class="bg-gray-700 border border-gray-600 rounded py-2 px-3 text-white focus:ring focus:ring-yellow-300"
                    type="file" name="image" id="image">
                @error('image')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
                    Update
                </button>
            </form>
        </div>
    @else
        <img class="w-1/2 mx-auto h-56 object-cover rounded-t-md" src="{{ asset('images/news1.png') }}"
            alt="Blog Image">

        <div class="p-4 ">
            <p class="text-gray-400 text-sm">
                {{ $blog->created_at->format('j M, g:i A') }} •
                <span class="font-semibold text-white">{{ $blog->user->name }}</span>
            </p>

            <h3 class="text-lg font-semibold mt-2 text-white">{{ $blog->title }}</h3>
            <p class="text-sm mt-2 text-gray-300">{{ $blog->body }}</p>

            <!-- Actions -->
            <div class="flex gap-3 mt-4">
                @if (!request()->routeIs('blogs.show'))
                    <a href="{{ route('blogs.show', $blog->id) }}">
                        <button class="bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-md text-white transition">
                            Show More
                        </button>
                    </a>
                @endif


                @auth
                    <a href="{{ route('blogs.edit', $blog->id) }}">
                        <button class="bg-yellow-500 hover:bg-yellow-600 px-5 py-2 rounded-md text-white transition">
                            Edit
                        </button>
                    </a>

                    <form action="{{ route('blogs.destroy', $blog) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="bg-red-500 hover:bg-red-600 px-5 py-2 rounded-md text-white transition">
                            Delete
                        </button>
                    </form>
                @endauth
                @include('blogs.like')
            </div>
        </div>


    @endif
</div>
