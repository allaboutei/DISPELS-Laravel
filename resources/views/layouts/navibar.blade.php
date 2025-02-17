<a class="" href="{{ route('home') }}">
    <img class="w-10 rounded-lg" src="{{ asset('images/DISPELS.jpg') }}" alt="Login Banner">

</a>
<a href="">
    <i class="fa-solid fa-gamepad"></i>
</a>
<div class="flex flex-row gap-4 items-center">
    @guest
        <a href="{{ route('login') }}"><button
                class="bg-gray-400 hover:bg-yellow-300 hover:text-black text-white py-1 px-3 rounded"> <i
                    class="fa-solid fa-user"></i></button></a>
    @endguest
    @auth
        <p class="text-sm">{{ Auth::user()->name }}</p>
        <a href="#">
            <button class="bg-gray-400 hover:bg-yellow-300 hover:text-black text-white py-1 px-3 rounded">
                <i class="fa-solid fa-user"></i>
            </button>
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-gray-400 hover:bg-yellow-300 hover:text-black text-white py-1 px-3 rounded">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </form>

    @endauth

</div>
