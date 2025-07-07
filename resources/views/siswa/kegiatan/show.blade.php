@extends('layouts.siswa')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        {{-- Header Ekskul --}}
        <h1 class="text-3xl font-bold text-red-600 mb-1">{{ $ekskul->nama }}</h1>
        <p class="text-gray-700 mb-2">{{ $ekskul->deskripsi ?? 'Tidak ada deskripsi kegiatan.' }}</p>
        <p class="text-sm text-gray-500 mb-6">
            Pembina: <strong>{{ $ekskul->pembina->name ?? '-' }}</strong>
        </p>

        {{-- Jadwal --}}
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-800 border-b pb-1 mb-3">📅 Jadwal Kegiatan</h2>
            @forelse ($jadwal as $item)
                <div class="text-sm text-gray-700 mb-2">
                    <span class="font-medium">{{ $item->hari }}</span>,
                    {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                    @if ($item->lokasi)
                        di <span class="italic">{{ $item->lokasi }}</span>
                    @endif
                </div>
            @empty
                <p class="text-sm text-gray-400 italic">Belum ada jadwal terdaftar.</p>
            @endforelse
        </div>

        {{-- Pengumuman --}}
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-800 border-b pb-1 mb-3">📢 Pengumuman Ekskul</h2>
            @forelse ($pengumuman as $item)
                <div class="mb-4 border border-gray-200 p-3 rounded">
                    <p class="font-semibold text-red-600 text-sm mb-1">{{ $item->judul }}</p>
                    <p class="text-sm text-gray-700">{{ $item->isi }}</p>
                    <p class="text-xs text-gray-500 mt-1">Diposting: {{ $item->created_at->format('d M Y') }}</p>
                </div>
            @empty
                <p class="text-sm text-gray-400 italic">Belum ada pengumuman.</p>
            @endforelse
        </div>

        {{-- Anggota --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-800 border-b pb-1 mb-3">👥 Anggota Ekskul</h2>
            <ul class="space-y-1 text-sm text-gray-700">
                @forelse ($anggota as $p)
                    <li>- {{ $p->siswa->name ?? '(Tidak diketahui)' }}</li>
                @empty
                    <li class="text-gray-400 italic">Belum ada anggota terdaftar.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
