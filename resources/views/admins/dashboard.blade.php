@extends('layouts.layout')
@section('content')
<p class="text-lg text-yellow-300">DISPELS Admin Dashboard</p>
    <a  href="{{route('admin.blogs')}}"><button class="mx-auto bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition" >
    Go To News Upload
   </button></a>



@endsection
