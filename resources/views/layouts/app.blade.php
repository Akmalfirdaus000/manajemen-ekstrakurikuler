<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SMKN 1 KOTO BARU') }} - @yield('title')</title>

    {{-- Tailwind CSS (gunakan via Vite atau CDN) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- NAVBAR -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-green-800">
                SMKN 1 KOTO BARU
            </a>
            <nav class="space-x-6 text-sm md:text-base">
                <a href="#profil" class="hover:text-green-700">Profil</a>
                <a href="#visi" class="hover:text-green-700">Visi Misi</a>
                <a href="#sejarah" class="hover:text-green-700">Sejarah</a>
                <a href="#kontak" class="hover:text-green-700">Kontak</a>
            </nav>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer id="kontak" class="bg-green-800 text-white py-8 mt-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between space-y-6 md:space-y-0">
                <div>
                    <h4 class="text-lg font-semibold">SMKN 1 KOTO BARU</h4>
                    <p class="text-sm mt-2">
                        Jalan Pinang Gadang, Koto Padang, Koto Baru, Kabupaten Dharmasraya, Sumatera Barat
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold">Kontak</h4>
                    <p class="text-sm mt-2">Email: info@smkn1kotobaru.sch.id</p>
                    <p class="text-sm">Telp: (0754) xxxx xxxx</p>
                </div>
            </div>
            <div class="text-center mt-8 text-xs text-gray-200">
                &copy; {{ date('Y') }} SMKN 1 KOTO BARU. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
