@extends('layouts.layout')
@section('content')
@auth
    <a  href="{{route('show-create-blog')}}"><button class="mx-auto bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition" >
    Go To News Upload
   </button></a>
@endauth
@guest
    <p class="text-lg text-yellow-300">Welcome to DISPELS</p>
@endguest
@endsection
