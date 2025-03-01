@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold text-yellow-300 mb-5">Teams</h2>

        <!-- Teams Section -->
        <div class="flex justify-between items-center mb-5">
            <p class="text-gray-400">This is our teams</p>

            <!-- Dropdown Button -->
            <div class="relative">
                <button id="dropdownBgHoverButton"
                    class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                    focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600
                    dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Filter By
                    <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownBgHover"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg dark:bg-gray-700 hidden z-10">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="checkbox-item-4" type="checkbox" class="w-4 h-4 text-blue-600">
                                <label for="checkbox-item-4" class="ml-2 text-sm text-gray-900 dark:text-gray-300">
                                    Default checkbox
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="checkbox-item-5" type="checkbox" checked class="w-4 h-4 text-blue-600">
                                <label for="checkbox-item-5" class="ml-2 text-sm text-gray-900 dark:text-gray-300">
                                    Checked state
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="checkbox-item-6" type="checkbox" class="w-4 h-4 text-blue-600">
                                <label for="checkbox-item-6" class="ml-2 text-sm text-gray-900 dark:text-gray-300">
                                    Default checkbox
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Teams Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($teams as $team)
                @include('shared.team-card')
            @empty
                <p>No Team Found</p>
            @endforelse
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownButton = document.getElementById("dropdownBgHoverButton");
            const dropdownMenu = document.getElementById("dropdownBgHover");

            dropdownButton.addEventListener("click", function() {
                dropdownMenu.classList.toggle("hidden");
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", function(event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add("hidden");
                }
            });
        });
    </script>
@endsection
