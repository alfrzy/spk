<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard')</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <div class="bg-blue-900 text-white p-4 flex justify-between items-center">
      <div class="text-xl font-bold">My Dashboard</div>
      
      <!-- Dropdown Profil -->
      <div class="relative">
        <button class="flex items-center space-x-2 bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none">
          <span>Profil</span>
          <svg class="w-8 h-8 text-white rounded-full bg-blue-700 p-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
        </svg>
        </button>
        
        <!-- Dropdown Menu -->
        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 hidden" id="profileDropdown">
          <ul class="py-2">
            <li><a href="{{ route('profile.update') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit Profil</a></li>
            <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Logout
                </button>
            </form>
        </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="flex flex-grow">
      <!-- Sidebar -->
      <div class="w-64 bg-blue-900 text-white min-h-screen">
        <div class="p-4 text-xl font-bold border-b border-blue-700">My Dashboard</div>
        <ul class="p-4">
          <li class="mb-4"><a href="/dashboard" class="hover:text-blue-300">Home</a></li>
          <li class="mb-4"><a href="/areas" class="hover:text-blue-300">Manage Areas</a></li>
        </ul>
      </div>

      <!-- Content -->
      <div class="flex-grow p-6">
        <div class="bg-white p-4 shadow rounded">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <script>
    // Dropdown Toggle
    document.querySelector('button').addEventListener('click', function() {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
  </script>
</body>
</html>
