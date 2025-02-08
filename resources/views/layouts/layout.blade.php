<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    @vite('resources/css/app.css')
</head>
<body>
@include('layouts.navibar')


<div class="container w-full">

    @yield('content')
</div>
@include('layouts.footer')
</body>
</html>

