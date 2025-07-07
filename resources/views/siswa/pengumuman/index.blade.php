@extends('layouts.siswa')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Pengumuman</h1>

@if ($pengumuman->isEmpty())
    <p class="text-gray-500 italic">Belum ada pengumuman.</p>
@else
    <div class="space-y-4">
        @foreach ($pengumuman as $item)
            <div class="bg-white shadow rounded p-4 border">
                <h2 class="text-lg font-semibold text-red-600">{{ $item->judul }}</h2>
                <p class="text-sm text-gray-600 mt-1">{{ \Illuminate\Support\Str::limit($item->isi, 200) }}</p>
                <div class="text-xs text-gray-500 mt-2">
                    Ditujukan untuk: <span class="capitalize">{{ $item->tujuan }}</span> |
                    {{ $item->created_at->format('d M Y') }} oleh {{ $item->pembuat->name ?? 'Admin' }}
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
