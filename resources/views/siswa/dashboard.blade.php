@extends('layouts.siswa')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Selamat Datang, {{ auth()->user()->name }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- Jumlah Ekskul --}}
        <div class="bg-white p-5 rounded shadow border-l-4 border-red-600">
            <p class="text-sm text-gray-500">Ekskul Diikuti</p>
            <p class="text-3xl font-bold text-red-600">{{ $jumlahEkskul }}</p>
        </div>

        {{-- Jadwal Terdekat --}}
        <div class="bg-white p-5 rounded shadow border-l-4 border-blue-600">
            <p class="text-sm text-gray-500 mb-1">Jadwal Terdekat</p>
            @if ($jadwalTerdekat)
                <p class="font-semibold">{{ $jadwalTerdekat->ekskul->nama }}</p>
                <p class="text-sm text-gray-600">{{ $jadwalTerdekat->hari }}, {{ $jadwalTerdekat->jam_mulai }} - {{ $jadwalTerdekat->jam_selesai }}</p>
            @else
                <p class="text-gray-600">Belum ada jadwal</p>
            @endif
        </div>

        {{-- Pengumuman Terbaru --}}
        <div class="bg-white p-5 rounded shadow border-l-4 border-yellow-500">
            <p class="text-sm text-gray-500 mb-1">Pengumuman Terbaru</p>
            @if ($pengumumanTerbaru)
                <p class="font-semibold">{{ $pengumumanTerbaru->judul }}</p>
                <p class="text-sm text-gray-600">{{ $pengumumanTerbaru->created_at->format('d M Y') }}</p>
            @else
                <p class="text-gray-600">Tidak ada pengumuman</p>
            @endif
        </div>
    </div>

    {{-- Notifikasi Tambahan --}}
    @if ($jadwalTerdekat)
        <div class="mt-8 bg-blue-50 border border-blue-200 p-4 rounded text-sm text-blue-800">
            📅 Jadwal selanjutnya: <strong>{{ $jadwalTerdekat->ekskul->nama }}</strong> — {{ $jadwalTerdekat->hari }}, {{ $jadwalTerdekat->jam_mulai }} - {{ $jadwalTerdekat->jam_selesai }}
        </div>
    @endif
@endsection
