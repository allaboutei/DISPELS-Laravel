<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if ($editing ?? false)
    <div class="bg-black px-8 py-6 rounded-sm  ">
        <form class="flex flex-col gap-4 text-white " action="{{ route('news.update', $new->id) }}" method="post">
            @csrf
@method('put')
            <label for="title">News Title</label>
            <input
                class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                type="text" name="title" id="title" value="{{ $new->title }}">
            @error('title')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror

            <label for="body">News Body</label>
            <textarea
                class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                name="body" id="body">
            {{ $new->body }}
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
                Update
            </button>
        </form>
    </div>
    @else
        <img class="w-full h-56 object-cover" src="{{ asset('images/news1.png') }}" alt="Blog Image">
        <div class="p-6">
            <p class="text-gray-500 text-sm">{{ $new->created_at }} <span class="font-semibold">Michael
                    Foster</span></p>
            <h3 class="text-lg font-semibold mt-2">{{ $new->title }}</h3>
            <p class="text-sm  mt-2">{{ $new->body }}</p>
            <div class="flex flex-row gap-5">
                <form action="{{ route('news.destroy', $new) }}" method="post">
                    @csrf
                    @method('delete')


                    <button class="bg-red-500 mt-2 px-5 py-2 rounded-full ">Delete</button>

                </form>
                <a href="{{ route('news.show', $new->id) }}"> <button
                        class="bg-blue-500 mt-2 px-5 py-2 rounded-full ">Info</button> </a>
                <a href="{{ route('news.edit', $new->id) }}">
                    <button class="bg-blue-500 mt-2 px-5 py-2 rounded-full ">Edit</button>
                </a>
            </div>
        </div>
    @endif


</div>
