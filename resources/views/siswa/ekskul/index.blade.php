@extends('layouts.siswa')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Kegiatan Ekstrakurikuler</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @forelse ($ekskuls as $ekskul)
        <div class="bg-white p-5 rounded shadow border border-gray-200">
            <h2 class="text-xl font-semibold text-red-600">{{ $ekskul->nama }}</h2>
            <p class="text-sm text-gray-600 mb-2">{{ $ekskul->deskripsi ?? '-' }}</p>
            <p class="text-sm text-gray-500">Pembina: <strong>{{ $ekskul->pembina->name ?? '-' }}</strong></p>
            <p class="text-sm text-gray-500 mt-1">
                Jadwal:
                @forelse ($ekskul->jadwals as $jadwal)
    <div>{{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</div>
@empty
    <div class="text-gray-400 italic">Belum ada jadwal</div>
@endforelse

            </p>
        </div>
    @empty
        <div class="text-gray-600">Belum ada kegiatan yang tersedia.</div>
    @endforelse
</div>
@endsection
