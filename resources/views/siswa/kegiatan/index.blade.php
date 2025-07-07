@extends('layouts.siswa')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Ekskul yang Kamu Ikuti</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($ekskuls as $ekskul)
        <div class="bg-white p-5 rounded shadow border border-gray-200 flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-semibold text-red-600 mb-2">{{ $ekskul->nama }}</h2>
                <p class="text-sm text-gray-600 mb-3">{{ Str::limit($ekskul->deskripsi, 100) ?? '-' }}</p>
                <p class="text-sm text-gray-500 mb-1">
                    Pembina: <strong>{{ $ekskul->pembina->name ?? '-' }}</strong>
                </p>
                <p class="text-sm text-gray-500">
                    Jadwal:
                    @forelse ($ekskul->jadwals as $jadwal)
                        <div>{{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</div>
                    @empty
                        <div class="text-gray-400 italic">Belum ada jadwal</div>
                    @endforelse
                </p>
            </div>

            <a href="{{ route('siswa.kegiatan.show', $ekskul->id) }}"
               class="mt-4 inline-block w-full text-center py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">
                Lihat Detail
            </a>
        </div>
    @empty
        <div class="col-span-full text-gray-600">
            Kamu belum mengikuti kegiatan ekstrakurikuler manapun.
        </div>
    @endforelse
</div>
@endsection
