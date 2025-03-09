<div class="max-w-4xl mx-auto p-6 bg-gray-900 text-white rounded-lg shadow-lg">
    <!-- Profile Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-yellow-400">Profile Information</h2>
        @if ($editing ?? false)
            <a href="{{ route('users.show', $user->id) }}"
                class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
                <i class="fa-solid fa-ban"></i> Cancel
            </a>
        @else
        @can('manage',$user)


            <a href="{{ route('users.edit', $user->id) }}"
                class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
                <i class="fa-solid fa-pen-to-square"></i> Edit
            </a>
            @endcan
        @endif

    </div>

    <!-- Profile Image -->
    <div class="flex flex-col items-center mb-6">
        <img class="w-24 h-24 rounded-full shadow-lg border-4 border-yellow-400" src="{{ $user->getImageURL() }}"
            alt="Profile Image">
        <p class="text-xl font-semibold mt-2">{{ $user->name }}</p>
    </div>
    @if ($editing ?? false)
        <div class="grid grid-cols-1 md:grid-cols-1 ">
            <div class="p-4 border border-yellow-400 rounded-lg">

                <form class="flex flex-col gap-5 text-white " action="{{ route('users.update', $user->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <label for="name">Name</label>
                    <input
                        class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="text" name="name" id="name" value="{{ $user->name }}">
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                    <label for="image">Image</label>
                    <input
                        class="bg-gray-800 border border-gray-600 rounded py-2 px-3 text-white focus:outline-none focus:ring focus:ring-yellow-300"
                        type="file" name="image" id="image">
                    @error('image')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <button
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition w-1/3 mx-auto">
                        Upload
                    </button>
                </form>

            </div>
        </div>
    @else
        <!-- Profile Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- User Perspective -->
            <div class="p-4 border border-yellow-400 rounded-lg">
                <h3 class="text-lg font-semibold text-yellow-300 mb-3">User Perspective</h3>
                <div class="bg-gray-800 p-3 rounded-lg shadow">
                    <p><span class="font-semibold text-gray-400">User Name:</span> {{ $user->name }}</p>
                </div>
                <div class="bg-gray-800 p-3 rounded-lg shadow mt-2">
                    <p><span class="font-semibold text-gray-400">User Email:</span> {{ $user->email }}</p>
                </div>
                <div class="bg-gray-800 p-3 rounded-lg shadow mt-2">
                    <p><span class="font-semibold text-gray-400">Member Since:</span> {{ $user->created_at->format('o, F') }}</p>
                </div>
            </div>

            @if ($user->is_admin == false && $user->is_host == false)
                <!-- Player Perspective -->
                <div class="p-4 border border-yellow-400 rounded-lg">
                    <h3 class="text-lg font-semibold text-yellow-300 mb-3">Player Perspective</h3>
                    <div class="bg-gray-800 p-3 rounded-lg shadow">
                        <p><span class="font-semibold text-gray-400">Gaming Name:</span>
                            {{ $user->player?->name ?? 'Not Registered' }}</p>
                    </div>

                    <div class="bg-gray-800 p-3 rounded-lg shadow mt-2">
                        <p><span class="font-semibold text-gray-400">In-Game Role:</span>
                            {{ $user->player?->role?->name ?? 'Not Registered' }}</p>
                    </div>

                    <div class="bg-gray-800 p-3 rounded-lg shadow mt-2">
                        <p><span class="font-semibold text-gray-400">Current Team:</span> Not Implemented Yet</p>
                    </div>
                </div>
            @endif





        </div>
    @endif

    <!-- Pending Invitations -->
    <div class="mt-8 text-center">
        <h3 class="text-xl font-semibold text-yellow-400">Pending Team Invitations</h3>
        <p class="text-gray-400 mt-2">There Are No Pending Invitations</p>
    </div>
</div>
