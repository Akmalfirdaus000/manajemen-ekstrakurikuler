@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Data Master - Kelas</h1>

@if(session('message'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif

<!-- Form Tambah Kelas -->
<form action="{{ route('admin.kelas.store') }}" method="POST" class="bg-white p-4 rounded shadow mb-6 max-w-md">
    @csrf
    <h2 class="text-lg font-semibold text-gray-700 mb-3">Tambah Kelas</h2>
    <div class="mb-3">
        <input type="text" name="nama" placeholder="Contoh: X ATP 1" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('nama') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
    <button type="submit"
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
        Simpan
    </button>
</form>

<!-- Tabel Kelas -->
<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full table-auto text-sm text-left">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3 font-semibold text-gray-700">#</th>
                <th class="px-4 py-3 font-semibold text-gray-700">Nama Kelas</th>
                <th class="px-4 py-3 font-semibold text-gray-700 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($kelasList as $kelas)
            <tr>
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $kelas->nama }}</td>
                <td class="px-4 py-2 text-center space-x-2">
                    <!-- Edit -->
                    <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST" class="inline-block">
                        @csrf @method('PUT')
                        <input type="text" name="nama" value="{{ $kelas->nama }}"
                               class="px-2 py-1 border rounded text-sm w-32">
                        <button type="submit"
                                class="px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                            Update
                        </button>
                    </form>

                    <!-- Delete -->
                    <form action="{{ route('admin.kelas.destroy', $kelas->id) }}" method="POST"
                          class="inline-block" onsubmit="return confirm('Hapus kelas ini?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="px-2 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
