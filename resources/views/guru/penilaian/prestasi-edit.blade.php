@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Prestasi Siswa</h1>

<form action="{{ route('guru.prestasi.update', $prestasi) }}" method="POST" class="bg-white p-6 rounded shadow max-w-2xl space-y-4">
    @csrf
    @method('PUT')

    {{-- Nama Event --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Event</label>
        <input type="text" name="nama_event" value="{{ old('nama_event', $prestasi->nama_event) }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
    </div>

    {{-- Tingkat --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Tingkat</label>
        <input type="text" name="tingkat" value="{{ old('tingkat', $prestasi->tingkat) }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
    </div>

    {{-- Peringkat --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Peringkat</label>
        <input type="text" name="peringkat" value="{{ old('peringkat', $prestasi->peringkat) }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
    </div>

    {{-- Tanggal --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
        <input type="date" name="tanggal" value="{{ old('tanggal', $prestasi->tanggal) }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
    </div>

    <div class="text-right pt-4">
        <a href="{{ route('guru.prestasi') }}" class="text-sm text-gray-600 hover:underline">← Batal</a>
        <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
            Simpan Perubahan
        </button>
    </div>
</form>
@endsection
