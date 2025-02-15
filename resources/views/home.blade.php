@extends('layouts.layout')
@section('content')
   <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
    <a href="{{route('show-create-news')}}">Go To News Upload</a>
   </button>
@endsection
