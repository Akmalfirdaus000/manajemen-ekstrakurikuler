<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


</head>
<body class="bg-gray-100 flex min-h-screen font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg border-r fixed h-screen z-10">
        <div class="p-6 flex items-center space-x-3 border-b">
            <img src="/logo.png" class="w-10 h-10" alt="logo">
            <span class="text-lg font-bold text-red-600 uppercase tracking-wide">Panel Kesiswaan</span>
        </div>

        <nav class="px-4 py-6 space-y-1 text-sm text-gray-700">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition
               {{ request()->routeIs('admin.dashboard') ? 'bg-red-100 text-red-600 font-semibold' : '' }}">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard
            </a>

            <a href="{{ route('admin.users') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="users" class="w-5 h-5"></i> Manajemen User
            </a>

            <a href="{{ route('ekskul.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="list" class="w-5 h-5"></i> Manajemen Kegiatan
            </a>

            <a href="{{ route('jadwal.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="calendar-clock" class="w-5 h-5"></i> Manajemen Jadwal
            </a>

           <!-- Data Master Dropdown -->
<div x-data="{ open: false }" class="relative">
    <button @click="open = !open"
        class="flex items-center justify-between w-full px-4 py-2 rounded-lg hover:bg-red-50 transition text-sm text-gray-700">
        <div class="flex items-center gap-3">
            <i data-lucide="database" class="w-5 h-5"></i> Data Master
        </div>
        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }"></i>
    </button>

    <div x-show="open" x-transition @click.away="open = false" class="ml-8 mt-1 space-y-1">
        <a href="{{ route('admin.kelas.index') }}"
           class="block px-4 py-1 rounded-lg text-sm hover:bg-red-50 {{ request()->is('admin/kelas*') ? 'bg-red-100 font-semibold text-red-600' : '' }}">
            Kelas
        </a>
        <a href="{{ route('admin.semester.index') }}"
           class="block px-4 py-1 rounded-lg text-sm hover:bg-red-50 {{ request()->is('admin/semester*') ? 'bg-red-100 font-semibold text-red-600' : '' }}">
            Semester
        </a>
        <a href="{{ route('admin.tahun.index') }}"
           class="block px-4 py-1 rounded-lg text-sm hover:bg-red-50 {{ request()->is('admin/tahun-ajaran*') ? 'bg-red-100 font-semibold text-red-600' : '' }}">
            Tahun Ajaran
        </a>
    </div>
</div>


            <a href="{{ route('pendaftaran.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="user-check" class="w-5 h-5"></i> Monitoring Pendaftaran
            </a>

            {{-- <a href="{{ route('admin.absensi') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="clipboard-list" class="w-5 h-5"></i> Monitoring Absensi
            </a> --}}

            <a href="{{ route('pengumuman.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="megaphone" class="w-5 h-5"></i> Pengumuman Umum
            </a>

 <!-- Laporan Sistem Dropdown -->
<div x-data="{ open: false }" class="relative">
    <button @click="open = !open"
        class="w-full flex items-center justify-between gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition text-sm text-gray-700">
        <div class="flex items-center gap-3">
            <i data-lucide="file-text" class="w-5 h-5"></i> Laporan Sistem
        </div>
        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }"></i>
    </button>

    <div x-show="open" x-transition @click.away="open = false" class="ml-8 mt-1 space-y-1" x-cloak>
        {{-- <a href="{{ route('admin.laporan.siswa_ekskul') }}"
           class="block px-4 py-1 rounded-lg text-sm hover:bg-red-100 {{ request()->routeIs('admin.laporan.siswa_ekskul') ? 'bg-red-100 text-red-600 font-semibold' : '' }}">
            Daftar Siswa Ekskul
        </a> --}}
        <a href="{{ route('admin.laporan.rekap_absensi') }}"
           class="block px-4 py-1 rounded-lg text-sm hover:bg-red-100 {{ request()->routeIs('admin.laporan.rekap_absensi') ? 'bg-red-100 text-red-600 font-semibold' : '' }}">
            Rekap Absensi
        </a>
        <a href="{{ route('admin.laporan.rekap_nilai') }}"
           class="block px-4 py-1 rounded-lg text-sm hover:bg-red-100 {{ request()->routeIs('admin.laporan.rekap_nilai') ? 'bg-red-100 text-red-600 font-semibold' : '' }}">
            Rekap Nilai
        </a>
        <a href="{{ route('admin.laporan.prestasi') }}"
           class="block px-4 py-1 rounded-lg text-sm hover:bg-red-100 {{ request()->routeIs('admin.laporan.prestasi') ? 'bg-red-100 text-red-600 font-semibold' : '' }}">
            Laporan Prestasi
        </a>
    </div>
</div>



            <a href="{{ route('admin.profil') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                <i data-lucide="user-circle" class="w-5 h-5"></i> Profil Admin
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
        lucide.createIcons(); // Aktifkan semua ikon
    </script>
</body>
</html>
