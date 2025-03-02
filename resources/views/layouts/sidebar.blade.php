<div class="flex flex-col  items-center text-[30px] gap-5 text-red-600  lg:py-20 lg:gap-10">


    <a href="{{ route('blogs') }}"><i
            class="fa-solid fa-newspaper hover:text-yellow-300  {{ Route::is('blogs') ? 'text-yellow-300' : '' }} "></i></a>
    <a href="{{ route('players') }}"><i class="fa-solid fa-user-group hover:text-yellow-300  {{ Route::is('players') ? 'text-yellow-300' : '' }}"></i></a>
    <a href="{{ route('teams') }}"><i class="fa-solid fa-shield-halved hover:text-yellow-300  {{ Route::is('teams') ? 'text-yellow-300' : '' }}"></i></a>
    <a href="{{ route(name: 'tournaments') }}"><i class="fa-solid fa-trophy hover:text-yellow-300  {{ Route::is('tiurnaments') ? 'text-yellow-300' : '' }}"></i></a>
    <a href="#"><i class="fa-solid fa-calendar-days"></i></a>
</div>
