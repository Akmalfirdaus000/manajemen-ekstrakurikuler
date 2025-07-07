@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Edit User</h1>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-2xl">
    @csrf
    @method('PUT')

    <!-- Nama -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Role (readonly) -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Peran</label>
        <input type="text" value="{{ ucfirst($user->role) }}" readonly
               class="w-full px-4 py-2 bg-gray-100 border rounded text-gray-700">
    </div>

    <!-- Kelas -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Kelas (jika siswa)</label>
        <input type="text" name="kelas" value="{{ old('kelas', $user->kelas) }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
    </div>

    <!-- No Induk / NIP -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nomor Induk / NIP</label>
        <input type="text" name="no_induk" value="{{ old('no_induk', $user->no_induk) }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        <input type="text" name="nip" value="{{ old('nip', $user->nip) }}" class="hidden">
    </div>

    <div class="flex justify-between mt-6">
        <a href="{{ route('admin.users') }}" class="text-gray-600 hover:underline">← Kembali</a>
        <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">Simpan Perubahan</button>
    </div>
</form>
@endsection
