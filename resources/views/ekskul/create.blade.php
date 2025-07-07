@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Kegiatan Ekstrakurikuler</h1>

<form action="{{ route('ekskul.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-3xl">
    @csrf

    <!-- Nama Kegiatan -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
        <input type="text" name="nama" value="{{ old('nama') }}" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('nama') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Deskripsi -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="deskripsi" rows="4"
                  class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500"
                  placeholder="Tulis deskripsi kegiatan">{{ old('deskripsi') }}</textarea>
        @error('deskripsi') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Pembina -->
    @if(auth()->user()->role === 'admin')
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Pembina</label>
        <select name="pembina_id" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
            <option value="">-- Pilih Guru Pembina --</option>
            @foreach($pembinas as $pembina)
                <option value="{{ $pembina->id }}" {{ old('pembina_id') == $pembina->id ? 'selected' : '' }}>
                    {{ $pembina->name }}
                </option>
            @endforeach
        </select>
        @error('pembina_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
    @else
        <input type="hidden" name="pembina_id" value="{{ auth()->id() }}">
    @endif

    <!-- Jadwal -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jadwal</label>
        <input type="text" name="jadwal" value="{{ old('jadwal') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500"
               placeholder="Contoh: Setiap Jumat, 15.00 WIB">
        @error('jadwal') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Lokasi -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Lokasi</label>
        <input type="text" name="lokasi" value="{{ old('lokasi') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500"
               placeholder="Contoh: Lapangan Basket, Aula, dll">
        @error('lokasi') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-between mt-6">
        <a href="{{ route('ekskul.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
        <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">Simpan</button>
    </div>
</form>
@endsection
