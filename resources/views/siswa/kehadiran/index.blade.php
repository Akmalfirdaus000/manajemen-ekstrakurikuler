@extends('layouts.siswa')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Kehadiran</h1>

@if(session('message'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('message') }}</div>
@endif
@if(session('error'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
@endif

{{-- Absen Hari Ini --}}
@if ($ekskulsHariIni->count())
    <h2 class="text-lg font-semibold mb-2">📌 Absen Hari Ini</h2>
    @foreach ($ekskulsHariIni as $ekskul)
        <div class="bg-white p-4 rounded shadow mb-4">
            <p class="text-sm font-semibold text-red-600">{{ $ekskul->nama }}</p>

            @if (in_array($ekskul->id, $sudahAbsen))
                <p class="text-green-600 text-sm mt-1">✅ Kamu sudah absen hari ini</p>
            @else
                <form action="{{ route('siswa.kehadiran.store', $ekskul->id) }}" method="POST" class="mt-2 space-y-2">
                    @csrf
                    <select name="status" class="w-full px-4 py-2 border rounded">
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="alfa">Alfa</option>
                    </select>
                    <button class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-2 rounded">
                        Simpan Absen
                    </button>
                </form>
            @endif
        </div>
    @endforeach
@endif

{{-- Riwayat --}}
<h2 class="text-lg font-semibold mt-8 mb-2">🗓️ Riwayat Sebelumnya</h2>
<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-2 text-left">Tanggal</th>
                <th class="px-4 py-2 text-left">Ekskul</th>
                <th class="px-4 py-2 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($absensis as $absen)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</td>
                    <td class="px-4 py-2">{{ $absen->ekskul->nama ?? '-' }}</td>
                    <td class="px-4 py-2 capitalize">
                        @if ($absen->status == 'hadir')
                            <span class="text-green-600 font-semibold">Hadir</span>
                        @elseif ($absen->status == 'izin')
                            <span class="text-yellow-600 font-semibold">Izin</span>
                        @else
                            <span class="text-red-600 font-semibold">Alfa</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center px-4 py-4 text-gray-500">Belum ada data kehadiran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
