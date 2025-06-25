<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200 dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-300 flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-gray-100 dark:bg-gray-800 shadow-md transition-colors duration-300">

        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <h1 class="text-2xl font-bold text-blue-600 dark:text-blue-400"><a href="/">PortfolioCraft</a></h1>
        
            <div class="flex items-center space-x-4">
                <!-- Dark Mode Toggle -->
                <button id="theme-toggle" class="bg-gray-700 dark:bg-gray-200 text-white dark:text-black p-2 rounded">
                    Dark Mode 🌙
                </button>

                <!-- Authentication Links -->
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-700 dark:bg-red-500 hover:bg-red-900 dark:hover:bg-red-600 text-white dark:text-black font-bold py-2 px-4 rounded transition duration-300">
                            🚪 Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-500 dark:bg-blue-400 hover:bg-blue-600 dark:hover:bg-blue-500 text-white dark:text-black font-bold py-2 px-4 rounded transition duration-300">
                        🔑 Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-blue-500 hover:underline">Register</a>
                    @endif

                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-6 flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 dark:bg-gray-300 shadow-inner py-4 transition-colors duration-300">
        <div class="container mx-auto text-center text-sm text-gray-300 dark:text-gray-600">
            &copy; 2025 PortfolioCraft. All rights reserved.
        </div>
    </footer>

    <!-- Dark Mode Toggle Script -->
    <script>
        const toggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        // Function to update button text based on current theme
        function updateToggleText() {
            if (html.classList.contains('dark')) {
                toggle.textContent = 'Light Mode ☀️';
            } else {
                toggle.textContent = 'Dark Mode 🌙';
            }
        }

        // Toggle theme and update button text
        toggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
            updateToggleText();
        });

        // On page load, set initial theme and button text
        if (localStorage.getItem('theme') === 'dark') {
            html.classList.add('dark');
        }
        updateToggleText();
    </script>
</body>
</html>
