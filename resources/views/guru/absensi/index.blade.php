@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Monitoring Absensi Siswa</h1>

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-100 border-b text-gray-600">
            <tr>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Nama Siswa</th>
                <th class="px-4 py-2">Kelas</th>
                <th class="px-4 py-2">Ekskul</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse ($absensis as $absen)
                <tr>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</td>
                    <td class="px-4 py-2">{{ $absen->siswa->name }}</td>
                    <td class="px-4 py-2">{{ $absen->siswa->kelas->nama ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $absen->ekskul->nama }}</td>
                    <td class="px-4 py-2 capitalize {{ $absen->status === 'alfa' ? 'text-red-600 font-bold' : 'text-gray-700' }}">
                        {{ $absen->status }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-4">Belum ada data absensi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
