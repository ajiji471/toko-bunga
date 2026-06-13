<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyFlorist - Toko Bunga Online')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="antialiased bg-rose-50 text-gray-800">
    <div class="min-h-screen flex flex-col relative overflow-hidden">
        
        <!-- Background -->
        @yield('background')
        
        <!-- Navbar -->
        @include('components.navbar')
        
        <!-- Main Content -->
        <main class="flex-grow relative z-10">
            @yield('content')
        </main>
        
        <!-- Footer -->
        @include('components.footer')
    </div>

    <script>
        lucide.createIcons();
    </script>

    @yield('scripts')
</body>
</html>