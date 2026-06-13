<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyFlorist')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="antialiased bg-rose-50 text-gray-800">
    <div class="min-h-screen flex items-center justify-center relative overflow-hidden px-4 py-8">
        
        <!-- Background Blob -->
        <div class="absolute top-10 left-10 w-72 h-72 bg-rose-200 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob"></div>
        <div class="absolute top-10 right-10 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob animation-delay-4000"></div>

        <!-- Back to Home -->
        <a href="/" class="absolute top-6 left-6 flex items-center gap-2 text-sm text-gray-500 hover:text-rose-600 transition z-20">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali ke Beranda
        </a>

        <!-- Main Content -->
        <div class="w-full max-w-md relative z-10">
            @yield('content')
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>

    @yield('scripts')
</body>
</html>