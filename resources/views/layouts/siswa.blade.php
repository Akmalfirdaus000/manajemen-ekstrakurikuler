<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Siswa - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script src="https://unpkg.com/alpinejs" defer></script>


    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
</head>
<body class="bg-gray-100 flex min-h-screen font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg border-r fixed h-screen z-10">
        <div class="p-6 flex items-center space-x-3 border-b">
            <img src="/logo.png" class="w-10 h-10" alt="logo">
            <span class="text-lg font-bold text-red-600 uppercase tracking-wide">Panel Siswa</span>
        </div>

        <nav class="px-4 py-6 space-y-1 text-sm text-gray-700">

            <a href="{{ route('siswa.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition
               {{ request()->routeIs('siswa.dashboard') ? 'bg-red-100 text-red-600 font-semibold' : '' }}">
                <i data-lucide="home" class="w-5 h-5"></i> Dashboard
            </a>

            <a href="{{ route('siswa.kegiatan') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="list" class="w-5 h-5"></i> Daftar Kegiatan
            </a>

            <a href="{{ route('siswa.pendaftaran') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="plus-circle" class="w-5 h-5"></i> Pendaftaran Ekskul
            </a>

            <a href="{{ route('siswa.jadwal.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="calendar-clock" class="w-5 h-5"></i> Jadwal Saya
            </a>

            <a href="{{ route('siswa.kehadiran.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="clipboard-list" class="w-5 h-5"></i> Riwayat Kehadiran
            </a>

            {{-- <a href="{{ route('siswa.umpan') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="message-circle" class="w-5 h-5"></i> Umpan Balik
            </a> --}}

          <!-- Nilai & Prestasi Dropdown -->
<div x-data="{ open: false }" class="relative">
    <button @click="open = !open"
            class="w-full flex items-center justify-between gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition text-sm text-gray-700">
        <div class="flex items-center gap-3">
            <i data-lucide="award" class="w-5 h-5"></i> Nilai & Prestasi
        </div>
        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }"></i>
    </button>

    <div x-show="open" x-transition @click.away="open = false" class="ml-8 mt-1 space-y-1" x-cloak>
        <a href="{{ route('siswa.nilai') }}"
           class="block px-4 py-1 rounded-lg text-sm hover:bg-red-100 {{ request()->routeIs('siswa.nilai') ? 'bg-red-100 text-red-600 font-semibold' : '' }}">
            Nilai Ekstrakurikuler
        </a>
        <a href="{{ route('siswa.prestasi') }}"
           class="block px-4 py-1 rounded-lg text-sm hover:bg-red-100 {{ request()->routeIs('siswa.prestasi') ? 'bg-red-100 text-red-600 font-semibold' : '' }}">
            Prestasi Saya
        </a>
    </div>
</div>


            <a href="{{ route('siswa.pengumuman.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="megaphone" class="w-5 h-5"></i> Pengumuman
            </a>

            <a href="{{ route('siswa.profil') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="user" class="w-5 h-5"></i> Profil
            </a>

            <hr class="my-4 border-gray-200">

            <a href="{{ route('logout') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition">
                <i data-lucide="log-out" class="w-5 h-5"></i> Logout
            </a>

        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 w-full p-6">
        @yield('content')
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
