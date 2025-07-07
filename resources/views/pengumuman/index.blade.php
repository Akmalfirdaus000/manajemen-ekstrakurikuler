{{-- @extends('layouts.admin') --}}
@extends(auth()->user()->role === 'guru' ? 'layouts.guru' : 'layouts.admin')


@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Pengumuman Umum</h1>

@if (session('message'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif

<div class="mb-4 text-right">
    <a href="{{ route('pengumuman.create') }}"
       class="inline-block px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition">
        + Tambah Pengumuman
    </a>
</div>

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="w-full table-auto text-sm text-left">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Tujuan</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3">Dibuat Oleh</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse ($pengumuman as $item)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->judul }}</td>
                    <td class="px-4 py-2 capitalize">{{ $item->tujuan }}</td>
                    <td class="px-4 py-2">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-2">{{ $item->pembuat->name ?? '-' }}</td>

                    <td class="px-4 py-2 text-center">
                        <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-4 py-4 text-center text-gray-500">Belum ada pengumuman.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
