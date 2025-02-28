<div class="w-full bg-gray-800 shadow-md rounded-lg overflow-hidden">
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
        <div class="flex flex-col lg:flex-row items-center  lg:items-start items-center bg-gray-700 p-4 gap-6">
            <!-- Image Section -->
            <div class="w-full lg:w-1/3 flex justify-center">
                <img class="w-full max-w-xs lg:max-w-full h-48 object-cover rounded-md shadow-md"
                    src="{{ $blog->getImageURL() }}" alt="Blog Image">
            </div>

            <!-- Content Section -->
            <div class="w-full lg:w-2/3 p-5">
                <p class="text-gray-400 text-sm flex items-center gap-2">
                    <span>{{ $blog->created_at->format('j M, g:i A') }}</span> •
                    <span class="font-semibold text-white">{{ $blog->user->name }}</span>
                </p>

                <h3 class="text-xl font-semibold mt-2 text-white">{{ $blog->title }}</h3>



                @if (!request()->routeIs('blogs.show') && (strlen($blog->body) > 50))
                <p class="text-md mt-2 text-gray-300">
                    {{ Str::limit($blog->body, 50, '...') }}
                    <a href="{{ route('blogs.show', $blog->id) }}" class="text-blue-400 hover:underline focus:outline-none">
                        Read More
                    </a>
                </p>
            @else
                <p class="text-md mt-2 text-gray-300">{{ $blog->body }}</p>
            @endif



            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col min-w-fit px-2 gap-3">
                @if (!request()->routeIs('blogs.show'))
                    <a href="{{ route('blogs.show', $blog->id) }}">
                        <button
                            class="btn-blue">
                            <i class="fa-solid fa-circle-info"></i>
                        </button>
                    </a>
                @endif

                @auth
                    @can('update', $blog)
                        @if (request()->routeIs('blogs.show'))
                            <a href="{{ route('blogs.edit', $blog->id) }}">
                                <button
                                    class="btn-yellow">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>

                            <form action="{{ route('blogs.destroy', $blog) }}" method="post">
                                @csrf
                                @method('delete')
                                <button
                                    class="btn-red">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    @endcan
                @endauth

                @include('blogs.like')
            </div>
        </div>
    @endif
</div>
