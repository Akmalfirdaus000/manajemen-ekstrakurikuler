<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="/logo.png">
</head>

<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-red-600 via-yellow-500 to-black">
    @include('components.alert')

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-4xl font-bold text-center text-red-600 mb-6">Daftar Siswa</h1>
        <p class="text-center text-gray-600 mb-8">Silakan isi data untuk membuat akun</p>

        <form action="{{ route('register.action') }}" method="POST">
            @csrf

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required
                    placeholder="Masukkan nama lengkap Anda"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    placeholder="Masukkan email aktif"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nomor Induk (NIS/NISN) -->
            <div class="mb-4">
                <label for="no_induk" class="block text-sm font-medium text-gray-700">Nomor Induk</label>
                <input id="no_induk" name="no_induk" type="text" value="{{ old('no_induk') }}"
                    placeholder="Contoh: 123456789"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600">
                @error('no_induk')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kelas -->
            <div class="mb-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input id="kelas" name="kelas" type="text" value="{{ old('kelas') }}"
                    placeholder="Contoh: XI ATP 1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600">
                @error('kelas')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input id="password" name="password" type="password" required
                    placeholder="Masukkan kata sandi"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    placeholder="Ulangi kata sandi"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600">
            </div>

            <!-- Tombol -->
            <button type="submit"
                class="w-full py-3 bg-red-600 text-white font-bold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600">
                Daftar
            </button>
        </form>
    </div>
</body>

</html>
