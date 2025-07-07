@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Kegiatan yang Anda Bina</h1>

@if ($ekskuls->count())
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($ekskuls as $ekskul)
            <div class="bg-white p-5 rounded-lg shadow border-l-4 border-red-500">
                <h2 class="text-xl font-semibold text-gray-800">{{ $ekskul->nama }}</h2>
                <p class="text-sm text-gray-600 mb-2">{{ $ekskul->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                <div class="text-sm text-gray-500">Jumlah Peserta: {{ $ekskul->pendaftaran()->count() }}</div>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-white p-6 rounded shadow text-gray-600">
        Anda belum memiliki kegiatan ekskul yang dibina.
    </div>
@endif
@endsection
