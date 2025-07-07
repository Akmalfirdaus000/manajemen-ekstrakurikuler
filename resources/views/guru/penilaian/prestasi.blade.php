@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Prestasi Siswa</h1>

@if(session('message'))
    <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif

{{-- Form Pilih Ekskul --}}
<form method="GET" action="{{ route('guru.prestasi.create') }}" class="mb-6">
    <label for="ekskul_id" class="block text-sm font-medium text-gray-700">Pilih Ekskul</label>
    <select name="ekskul_id" id="ekskul_id" onchange="this.form.submit()"
            class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-red-500" required>
        <option value="">-- Pilih Ekskul --</option>
        @foreach ($ekskuls as $ekskul)
            <option value="{{ $ekskul->id }}" {{ request('ekskul_id') == $ekskul->id ? 'selected' : '' }}>
                {{ $ekskul->nama }}
            </option>
        @endforeach
    </select>
</form>

@if(request('ekskul_id'))
<form action="{{ route('guru.prestasi.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-3xl space-y-6">
    @csrf
    <input type="hidden" name="ekskul_id" value="{{ request('ekskul_id') }}">

    {{-- Pilih Siswa --}}
    <div>
        <label for="user_id" class="block text-sm font-medium text-gray-700">Pilih Siswa</label>
        <select name="user_id" id="user_id"
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-red-500" required>
            <option value="">-- Pilih Siswa --</option>
            @foreach ($siswaList as $item)
                <option value="{{ $item->siswa->id }}" {{ old('user_id') == $item->siswa->id ? 'selected' : '' }}>
                    {{ $item->siswa->name }}
                </option>
            @endforeach
        </select>
        @error('user_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Nama Event --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Event</label>
        <input type="text" name="nama_event" value="{{ old('nama_event') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500" required>
        @error('nama_event') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Tingkat --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Tingkat</label>
        <input type="text" name="tingkat" value="{{ old('tingkat') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500" required>
        @error('tingkat') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Peringkat --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Peringkat</label>
        <input type="text" name="peringkat" value="{{ old('peringkat') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500" required>
        @error('peringkat') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Tanggal --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
        <input type="date" name="tanggal" value="{{ old('tanggal') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500" required>
        @error('tanggal') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Tombol Aksi --}}
    <div class="flex justify-between pt-4">
        <a href="{{ route('guru.prestasi') }}" class="text-sm text-gray-600 hover:underline">← Kembali ke daftar</a>
        <button type="submit"
                class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
            Simpan Prestasi
        </button>
    </div>
</form>
@endif
@endsection
