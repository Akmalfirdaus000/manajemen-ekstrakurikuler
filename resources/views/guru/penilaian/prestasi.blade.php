@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Prestasi Siswa</h1>

@if(session('message'))
    <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif

<form action="{{ route('guru.prestasi.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-3xl space-y-6">
    @csrf

    {{-- Pilih Ekskul --}}
    <div>
        <label for="ekskul_id" class="block text-sm font-medium text-gray-700">Pilih Ekskul</label>
        <select name="ekskul_id" id="ekskul_id" onchange="this.form.submit()"
                class="w-full mt-1 px-4 py-2 border rounded focus:ring-2 focus:ring-red-500" required>
            <option value="">-- Pilih Ekskul --</option>
            @foreach ($ekskuls as $ekskul)
                <option value="{{ $ekskul->id }}" {{ old('ekskul_id', request('ekskul_id')) == $ekskul->id ? 'selected' : '' }}>
                    {{ $ekskul->nama }}
                </option>
            @endforeach
        </select>
        @error('ekskul_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Daftar Siswa --}}
    @php
        $siswaList = request('ekskul_id')
            ? \App\Models\Pendaftaran::with('siswa')->where('ekskul_id', request('ekskul_id'))->get()
            : collect();
    @endphp

    @if ($siswaList->count())
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Siswa Pemenang</label>
            <div class="space-y-2 border rounded p-4 max-h-60 overflow-y-auto">
                @foreach ($siswaList as $item)
                    <label class="flex items-center space-x-3">
                        <input type="radio" name="user_id" value="{{ $item->siswa->id }}" required
                               {{ old('user_id') == $item->siswa->id ? 'checked' : '' }}>
                        <span>{{ $item->siswa->name }}</span>
                    </label>
                @endforeach
            </div>
            @error('user_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
    @elseif(request('ekskul_id'))
        <div class="mt-4 p-4 bg-yellow-50 border border-yellow-300 text-yellow-700 rounded text-sm">
            Belum ada siswa yang mendaftar ekskul ini.
        </div>
    @endif

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
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500"
               placeholder="Contoh: Sekolah, Kabupaten, Nasional" required>
        @error('tingkat') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Peringkat --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Peringkat</label>
        <input type="text" name="peringkat" value="{{ old('peringkat') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500"
               placeholder="Contoh: Juara 1, Harapan 2" required>
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
@endsection
