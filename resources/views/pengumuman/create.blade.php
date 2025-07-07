{{-- @extends('layouts.admin') --}}
@extends(auth()->user()->role === 'guru' ? 'layouts.guru' : 'layouts.admin')


@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Buat Pengumuman Baru</h1>

@if ($errors->any())
    <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
        <ul class="text-sm list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pengumuman.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-xl space-y-4">
    @csrf

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
        <input type="text" name="judul" value="{{ old('judul') }}" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Isi</label>
        <textarea name="isi" rows="5" required
                  class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">{{ old('isi') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan</label>
        <select name="tujuan" required
                class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
            <option value="">-- Pilih Tujuan --</option>
            <option value="siswa" {{ old('tujuan') == 'siswa' ? 'selected' : '' }}>Siswa</option>
            <option value="guru" {{ old('tujuan') == 'guru' ? 'selected' : '' }}>Guru</option>
            <option value="semua" {{ old('tujuan') == 'semua' ? 'selected' : '' }}>Semua</option>
        </select>
    </div>

    <div class="text-right">
        <button type="submit"
                class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
            Simpan
        </button>
    </div>
</form>
@endsection
