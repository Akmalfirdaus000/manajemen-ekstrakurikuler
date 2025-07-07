@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Guru Pembina</h1>

{{-- Ringkasan --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Kegiatan Dibina -->
    <div class="bg-white p-5 rounded-lg shadow border-l-4 border-red-600">
        <div class="text-sm text-gray-500">Kegiatan Dibina</div>
        <div class="text-3xl font-bold text-gray-800">{{ $totalEkskul }}</div>
    </div>

    <!-- Total Peserta -->
    <div class="bg-white p-5 rounded-lg shadow border-l-4 border-green-600">
        <div class="text-sm text-gray-500">Total Peserta</div>
        <div class="text-3xl font-bold text-gray-800">{{ $totalPeserta }}</div>
    </div>

    <!-- Jadwal Terdekat -->
    <div class="bg-white p-5 rounded-lg shadow border-l-4 border-blue-600">
        <div class="text-sm text-gray-500">Jadwal Terdekat</div>
        @if($jadwalBerikutnya)
            <div class="text-lg font-semibold text-gray-800 mt-1">
                {{ \Carbon\Carbon::parse($jadwalBerikutnya->tanggal)->translatedFormat('l, d M Y') }}
            </div>
            <div class="text-sm text-gray-600">
                Ekskul: {{ $jadwalBerikutnya->ekskul->nama }}
            </div>
        @else
            <div class="text-sm text-gray-500 mt-1">Tidak ada jadwal mendatang</div>
        @endif
    </div>
</div>

{{-- Pengumuman --}}
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-lg font-semibold text-red-600 mb-4">Pengumuman Terkini</h2>

    @forelse($pengumuman as $p)
        <div class="mb-4 pb-4 border-b border-gray-200">
            <div class="text-md font-bold text-gray-800">{{ $p->judul }}</div>
            <div class="text-sm text-gray-700 mt-1">{{ $p->isi }}</div>
            <div class="text-xs text-gray-400 mt-2">{{ $p->created_at->diffForHumans() }}</div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada pengumuman untuk Anda.</p>
    @endforelse
</div>
@endsection
