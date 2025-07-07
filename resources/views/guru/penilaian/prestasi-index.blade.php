@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Prestasi Siswa</h1>

@if(session('message'))
    <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-300 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif
<div class="mb-4 text-right">
    <a href="{{ route('guru.prestasi.create') }}"
       class="inline-block bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm">
        + Tambah Prestasi
    </a>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-700 border-b">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama Siswa</th>
                <th class="px-4 py-2">Ekskul</th>
                <th class="px-4 py-2">Event</th>
                <th class="px-4 py-2">Tingkat</th>
                <th class="px-4 py-2">Peringkat</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse ($prestasis as $item)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->siswa->name }}</td>
                    <td class="px-4 py-2">{{ $item->ekskul->nama ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item->nama_event }}</td>
                    <td class="px-4 py-2">{{ $item->tingkat }}</td>
                    <td class="px-4 py-2">{{ $item->peringkat }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <a href="{{ route('guru.prestasi.edit', $item) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                        <form action="{{ route('guru.prestasi.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-gray-500 py-4">Belum ada data prestasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
