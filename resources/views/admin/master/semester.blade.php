@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Data Master - Semester</h1>

@if(session('message'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif

<form action="{{ route('admin.semester.store') }}" method="POST" class="bg-white p-4 rounded shadow mb-6 max-w-md">
    @csrf
    <h2 class="text-lg font-semibold text-gray-700 mb-3">Tambah Semester</h2>
    <div class="mb-3">
        <input type="text" name="nama" placeholder="Ganjil / Genap" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('nama') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
    <button type="submit"
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
        Simpan
    </button>
</form>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full table-auto text-sm text-left">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3 font-semibold text-gray-700">#</th>
                <th class="px-4 py-3 font-semibold text-gray-700">Nama Semester</th>
                <th class="px-4 py-3 font-semibold text-gray-700 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($semesters as $semester)
            <tr>
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $semester->nama }}</td>
                <td class="px-4 py-2 text-center space-x-2">
                    <form action="{{ route('admin.semester.update', $semester->id) }}" method="POST" class="inline-block">
                        @csrf @method('PUT')
                        <input type="text" name="nama" value="{{ $semester->nama }}"
                               class="px-2 py-1 border rounded text-sm w-24">
                        <button type="submit"
                                class="px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                            Update
                        </button>
                    </form>
                    <form action="{{ route('admin.semester.destroy', $semester->id) }}" method="POST"
                          class="inline-block" onsubmit="return confirm('Hapus semester ini?')">
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
