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
    <header class=" w-full bg-black text-white shadow-lg z-50">
        <div class="container mx-auto flex justify-between items-center p-4">
            @include('layouts.navibar')
        </div>
    </header>

    <!-- Main Layout -->
    <div class="flex flex-col lg:flex-row container mx-auto min-h-screen mt-20 px-6 gap-6">
        <!-- Sidebar (Visible on LG Screens) -->
        <aside class="hidden lg:flex flex-col justify-center items-center text-red-600 w-48 py-10 gap-6">
            @include('layouts.sidebar')
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-800 text-white rounded-lg p-6 shadow-lg">
            @include('shared.flash-message')
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class=" w-full bg-black text-gray-400 text-center py-4">
        @include('layouts.footer')
    </footer>

    <!-- Alert Dismiss Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                let alert = document.getElementById('alert-box');
                if (alert) {
                    alert.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000);
        });
    </script>
</body>

</html>
