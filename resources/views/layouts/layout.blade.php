<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class=" bg-gray-900 flex flex-col h-full">
    <div class="flex flex-row justify-between items-center text-xl p-5  bg-black text-white">
        @include('layouts.navibar')
    </div>
    <div class="flex flex-row justify-center items-center px-5 gap-5 lg:justify-between">
        <div class="items-center w-15 text-[40px] gap-5 text-red-600 lg:flex flex-col py-20 lg:gap-10">
            @include('layouts.sidebar')
        </div>
        <div class="flex flex-col justify-center items-center my-5 lg:w-full">
            @include('shared.flash-message')
            @yield('content')
        </div>
    </div>


    @include('layouts.footer')
    <script>
        setTimeout(() => {
            let alert = document.getElementById('alert-box');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    </script>
</body>

</html>
