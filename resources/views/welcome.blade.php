<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortfolioCraft – Create Your Personal Portfolio</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        /* Make html and body take full height and use Flexbox */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        /* Make main content area expand to fill available space */
        .flex-grow {
            flex-grow: 1;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-200 transition-colors duration-300">

    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-md transition-colors duration-300">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <h1 class="text-2xl font-bold text-blue-600 dark:text-blue-400">PortfolioCraft</h1>
            <nav class="flex items-center space-x-4">
                <!-- Dark Mode Toggle Button -->
                <button id="theme-toggle" type="button" class="bg-gray-700 dark:bg-gray-200 text-white dark:text-black p-2 rounded">
                    Dark Mode 🌙
                </button>

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
            </nav>
        </div>
    </header>

    <!-- Main content with flex-grow to push footer down -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <section class="container mx-auto text-center py-20 px-6">
            <h2 class="text-4xl font-bold mb-4">Create Stunning Personal Portfolios in Minutes</h2>
            <p class="mb-6 text-lg">Showcase your projects, skills, and experience without writing a line of code.</p>

            @auth
                <!-- No button shown when logged in -->
            @else
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-blue-700">
                        Get Started
                    </a>
                @endif
            @endauth
        </section>

        <!-- Features Section -->
        <section class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 py-10 px-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transition-colors duration-300">
                <h3 class="text-xl font-bold mb-2">Easy Setup</h3>
                <p>Register, fill out your profile, and your portfolio is live!</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transition-colors duration-300">
                <h3 class="text-xl font-bold mb-2">Beautiful Templates</h3>
                <p>Choose from stunning design templates to make your portfolio pop.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transition-colors duration-300">
                <h3 class="text-xl font-bold mb-2">Share & Export</h3>
                <p>Share your unique portfolio URL or export as HTML/PDF.</p>
            </div>
        </section>
    </main>

    <!-- Footer sticks to bottom -->
    <footer class="bg-gray-800 dark:bg-gray-300 shadow-inner py-4 transition-colors duration-300">
        <div class="container mx-auto text-center text-sm text-gray-600 dark:text-gray-400">
            &copy; 2025 PortfolioCraft. All rights reserved.
        </div>
    </footer>

    <!-- Dark Mode Toggle Script -->
    <script>
        const toggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        function updateToggleText() {
            if (html.classList.contains('dark')) {
                toggle.textContent = 'Light Mode ☀️';
            } else {
                toggle.textContent = 'Dark Mode 🌙';
            }
        }

        toggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
            updateToggleText();
        });

        if (localStorage.getItem('theme') === 'dark') {
            html.classList.add('dark');
        }
        updateToggleText();
    </script>

</body>
</html>
