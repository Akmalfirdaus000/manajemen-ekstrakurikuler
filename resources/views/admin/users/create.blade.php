@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah User</h1>

<form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-2xl">
    @csrf

    <!-- Nama -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" name="name" value="{{ old('name') }}" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Password -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Role -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Peran</label>
        <select name="role" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
            <option value="">-- Pilih Peran --</option>
            <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
            <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
        </select>
        @error('role') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Kelas -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Kelas (jika siswa)</label>
        <input type="text" name="kelas" value="{{ old('kelas') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
    </div>

    <!-- No Induk / NIP -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nomor Induk (siswa) / NIP (guru)</label>
        <input type="text" name="no_induk" value="{{ old('no_induk') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        <input type="text" name="nip" value="{{ old('nip') }}"
               class="hidden"> <!-- dipakai opsional backend -->
    </div>

    <div class="flex justify-between mt-6">
        <a href="{{ route('admin.users') }}" class="text-gray-600 hover:underline">← Kembali</a>
        <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">Simpan</button>
    </div>
</form>
@endsection
