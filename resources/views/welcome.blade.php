<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Cleaning Scheduler</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-blue-600 text-white">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold">Campus Cleaning Scheduler</a>
            @if (Auth::check())
                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                    Go to Dashboard
                </a>
            @else
            <div class="flex space-x-4"> <!-- Menambahkan space-x-4 untuk mengatur jarak antar tombol -->
                <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                    Register
                </a>
            </div>
            @endif
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-500 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to Campus Cleaning Scheduler</h1>
            <p class="text-lg mb-6">Efficient and smart solutions to maintain campus cleanliness with ease.</p>
            <a href="/login" class="px-6 py-3 bg-white text-blue-500 font-semibold rounded hover:bg-gray-100">
                Get Started
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Features</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded shadow">
                    <svg class="h-12 w-12 text-blue-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 20H4v-2c0-3.31 2.69-6 6-6h4c3.31 0 6 2.69 6 6v2z" />
                    </svg>
                    <h3 class="text-xl font-bold mb-2">User Management</h3>
                    <p>Manage users with roles like Admin, Staff, and more.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded shadow">
                    <svg class="h-12 w-12 text-blue-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <h3 class="text-xl font-bold mb-2">Cleaning Schedules</h3>
                    <p>Organize and prioritize cleaning tasks efficiently.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded shadow">
                    <svg class="h-12 w-12 text-blue-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14c-4.41 0-8 1.79-8 4v2h16v-2c0-2.21-3.59-4-8-4z" />
                    </svg>
                    <h3 class="text-xl font-bold mb-2">Reports</h3>
                    <p>Generate reports for better decision-making.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Campus Cleaning Scheduler. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
