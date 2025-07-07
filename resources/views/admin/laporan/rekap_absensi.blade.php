@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Rekap Absensi Per Ekskul</h1>

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="w-full table-auto text-sm text-left">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Nama Ekskul</th>
                <th class="px-4 py-3">Jumlah Siswa</th>
                <th class="px-4 py-3">Total Absensi (Hadir)</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse ($rekap as $item)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->nama }}</td>
                    <td class="px-4 py-2">{{ $item->jumlah_siswa }}</td>
                    <td class="px-4 py-2">{{ $item->total_absen }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center py-4 text-gray-500">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
