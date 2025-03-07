<nav class="bg-gray-900 w-full text-white flex justify-between items-center px-6 py-3 shadow-lg">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="flex items-center">
        <img class="w-12 rounded-lg transition-transform transform hover:scale-110"
            src="{{ asset('images/DISPELS.jpg') }}" alt="DISPELS Logo">
    </a>

    <!-- Navigation Links -->
    <div class="flex items-center gap-6">
        <a href="{{ route('games') }}" class="text-yellow-400 text-xl hover:text-yellow-300 transition">
            <i class="fa-solid fa-gamepad"></i>
        </a>

        @auth

            <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold hover:text-yellow-300">
                Admin Dashboard
            </a>    

            <!-- User Info -->
            <div class="flex items-center gap-4">
                <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>

                <!-- Profile Button -->
                <a href="{{ route('users.show', Auth::user()->id) }}"
                    class="bg-gray-700 hover:bg-yellow-400 text-white hover:text-black py-2 px-3 rounded-lg transition">
                    <i class="fa-solid fa-user"></i>
                </a>

                <!-- Logout Form -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-700 hover:bg-red-500 text-white py-2 px-3 rounded-lg transition">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        @endauth

        @guest
            <a href="{{ route('login') }}"
                class="bg-gray-700 hover:bg-yellow-400 text-white hover:text-black py-2 px-3 rounded-lg transition">
                <i class="fa-solid fa-user"></i>
            </a>
        @endguest
    </div>
</nav>
