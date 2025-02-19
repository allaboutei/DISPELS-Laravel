<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 flex flex-col min-h-screen">
    <!-- Navbar -->
    <div class="flex justify-between items-center text-xl p-5 bg-black text-white">
        @include('layouts.navibar')
    </div>

    <!-- Main Layout -->
    <div class="flex flex-row justify-between w-full gap-10 px-5">
        <!-- Sidebar -->
        <aside class="hidden lg:flex flex-col justify-center items-center text-xl text-red-600 w-1/6 py-20 gap-10">
            @include('layouts.sidebar')
        </aside>

        <!-- Main Content -->
        <main class="flex-1 w-full lg:w-5/6 bg-gray-800 text-white rounded-lg p-6 shadow-lg">
            @include('shared.flash-message')
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="mt-auto">
        @include('layouts.footer')
    </footer>

    <!-- Alert Dismiss Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                let alert = document.getElementById('alert-box');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000);
        });
    </script>
</body>


</html>
