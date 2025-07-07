@extends('layouts.siswa')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Jadwal Saya</h1>

<div class="bg-white shadow rounded overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-2 text-left">Ekskul</th>
                <th class="px-4 py-2 text-left">Hari</th>
                <th class="px-4 py-2 text-left">Jam</th>
                <th class="px-4 py-2 text-left">Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jadwals as $jadwal)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $jadwal->ekskul->nama }}</td>
                    <td class="px-4 py-2">{{ $jadwal->hari }}</td>
                    <td class="px-4 py-2">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                    <td class="px-4 py-2">{{ $jadwal->lokasi ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">Belum ada jadwal yang terdaftar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
