@extends('layouts.layout')
@section('content')
@auth
<p class="text-lg text-yellow-300">Welcomeback to DISPELS</p>
@endauth
@guest
    <p class="text-lg text-yellow-300">Welcome to DISPELS</p>
@endguest
@endsection
