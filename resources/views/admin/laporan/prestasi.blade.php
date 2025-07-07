@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Laporan Prestasi Siswa</h1>

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="w-full table-auto text-sm text-left">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Nama Siswa</th>
                <th class="px-4 py-3">Kelas</th>
                <th class="px-4 py-3">Ekskul</th>
                <th class="px-4 py-3">Event</th>
                <th class="px-4 py-3">Tingkat</th>
                <th class="px-4 py-3">Peringkat</th>
                <th class="px-4 py-3">Tanggal</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse ($prestasis as $item)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->user->name }}</td>
                    <td class="px-4 py-2">{{ $item->user->kelas->nama ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item->ekskul->nama ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item->nama_event }}</td>
                    <td class="px-4 py-2">{{ $item->tingkat }}</td>
                    <td class="px-4 py-2">{{ $item->peringkat }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center py-4 text-gray-500">Belum ada data prestasi.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
