@extends('components.layouts.app')

@section('title', 'MyFlorist - Selamat Datang')

@section('background')
    @include('components.background')
@endsection

@section('content')
    <div class="flex items-center justify-center min-h-[calc(100vh-8rem)] px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 mb-4 px-4 py-1.5 bg-rose-100 text-rose-700 rounded-full text-sm font-medium">
                <i data-lucide="sparkles" class="w-4 h-4"></i>
                Toko Bunga Terpercaya
            </div>

            {{-- Heading --}}
            <h1 class="text-4xl sm:text-6xl font-extrabold text-gray-900 tracking-tight mb-6 leading-tight">
                Hiasi Hari Istimewa Anda dengan <span class="text-rose-500">Keindahan Bunga</span>
            </h1>

            {{-- Description --}}
            <p class="text-lg sm:text-xl text-gray-600 mb-10 leading-relaxed max-w-2xl mx-auto">
                Temukan rangkaian bunga segar dan indah untuk setiap momen spesial. 
                Dari buket romantis hingga dekorasi elegan — kami siap mewarnai harimu.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('login') }}" 
                   class="flex items-center justify-center gap-2 w-full sm:w-auto px-8 py-4 text-base font-semibold text-rose-600 bg-white border-2 border-rose-200 rounded-2xl hover:border-rose-400 hover:bg-rose-50 transition duration-300 shadow-sm">
                    <i data-lucide="log-in" class="w-5 h-5"></i>
                    Masuk ke Akun
                </a>
                <a href="#" 
                   class="flex items-center justify-center gap-2 w-full sm:w-auto px-8 py-4 text-base font-semibold text-white bg-rose-500 rounded-2xl hover:bg-rose-600 transition duration-300 shadow-lg shadow-rose-200">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                    Buat Akun Baru
                </a>
            </div>

            {{-- Features --}}
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-3 gap-6 text-sm text-gray-500">
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 bg-rose-100 rounded-full flex items-center justify-center text-rose-500">
                        <i data-lucide="flower" class="w-6 h-6"></i>
                    </div>
                    <span class="font-medium text-gray-700">Bunga Segar</span>
                    <span>Langsung dari petani</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 bg-rose-100 rounded-full flex items-center justify-center text-rose-500">
                        <i data-lucide="truck" class="w-6 h-6"></i>
                    </div>
                    <span class="font-medium text-gray-700">Pengiriman Cepat</span>
                    <span>Sampai di hari yang sama</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 bg-rose-100 rounded-full flex items-center justify-center text-rose-500">
                        <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                    </div>
                    <span class="font-medium text-gray-700">Kustomisasi</span>
                    <span>Desain sesuai keinginan</span>
                </div>
            </div>
        </div>
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