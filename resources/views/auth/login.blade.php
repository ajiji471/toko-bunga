@extends('components.layouts.form')

@section('title', 'Masuk - MyFlorist')

@section('content')
    <!-- Card -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-rose-100 p-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-rose-100 rounded-full mb-4">
                <i data-lucide="flower-2" class="w-8 h-8 text-rose-500"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900">Masuk ke MyFlorist</h1>
            <p class="mt-2 text-sm text-gray-500">Silakan masuk untuk melanjutkan</p>
        </div>

        <!-- Error Message -->
        @error('login-error')
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-2 text-red-600 text-sm">
                <i data-lucide="alert-circle" class="w-4 h-4 flex-shrink-0"></i>
                <span>{{ $message }}</span>
            </div>
        @enderror

        <!-- Form -->
        <form action="{{ route('login.process') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                    <i data-lucide="mail" class="w-4 h-4 text-rose-400"></i>
                    Email
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required
                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition duration-200"
                    placeholder="nama@email.com"
                >
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                    <i data-lucide="lock" class="w-4 h-4 text-rose-400"></i>
                    Password
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required
                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition duration-200"
                    placeholder="••••••••"
                >
                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-rose-500 focus:ring-rose-500">
                    <span class="text-sm text-gray-600">Ingat saya</span>
                </label>
                <a href="#" class="text-sm text-rose-500 hover:text-rose-600 font-medium">Lupa password?</a>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full flex items-center justify-center gap-2 bg-rose-500 hover:bg-rose-600 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 shadow-lg shadow-rose-200"
            >
                <i data-lucide="log-in" class="w-5 h-5"></i>
                Masuk
            </button>
        </form>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-500">atau</span>
            </div>
        </div>

        <!-- Register Link -->
        <p class="text-center text-sm text-gray-600">
            Belum punya akun? 
            <a href="#" class="font-semibold text-rose-500 hover:text-rose-600 transition">Daftar sekarang</a>
        </p>
    </div>
@endsection

@section('scripts')
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
@endsection