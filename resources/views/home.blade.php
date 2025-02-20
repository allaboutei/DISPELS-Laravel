@extends('layouts.layout')
@section('content')
@auth
<p class="text-lg text-yellow-300">Welcomeback to DISPELS, <span class="text-green-300 text-xl" >{{Auth::user()->name}}</span></p>
@endauth
@guest
    <p class="text-lg text-yellow-300">Welcome to DISPELS</p>
@endguest
@endsection
