@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Selamat Datang wakil kesiswaan!</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white shadow rounded-lg p-4 text-center">
            <p class="text-sm text-gray-600">Total Guru</p>
            <h2 class="text-2xl font-bold text-blue-600">{{ $totalGuru ?? 0 }}</h2>
        </div>
        <div class="bg-white shadow rounded-lg p-4 text-center">
            <p class="text-sm text-gray-600">Total Siswa</p>
            <h2 class="text-2xl font-bold text-green-600">{{ $totalSiswa ?? 0 }}</h2>
        </div>
        <div class="bg-white shadow rounded-lg p-4 text-center">
            <p class="text-sm text-gray-600">Total Ekskul</p>
            <h2 class="text-2xl font-bold text-yellow-600">{{ $totalEkskul ?? 0 }}</h2>
        </div>
        <div class="bg-white shadow rounded-lg p-4 text-center">
            <p class="text-sm text-gray-600">Pendaftar</p>
            <h2 class="text-2xl font-bold text-red-600">{{ $totalPendaftar ?? 0 }}</h2>
        </div>
    </div>
@endsection
