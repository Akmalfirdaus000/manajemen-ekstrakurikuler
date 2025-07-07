@extends('layouts.siswa')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Pendaftaran Ekskul</h1>

    {{-- Notifikasi --}}
    @if (session('message'))
        <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('message') }}
        </div>
    @elseif (session('error'))
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif

    {{-- Ekskul --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($ekskuls as $ekskul)
            <div class="bg-white rounded-lg shadow border p-5 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-red-600 mb-1">{{ $ekskul->nama }}</h2>
                    <p class="text-sm text-gray-700 mb-2">{{ $ekskul->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                    <p class="text-sm text-gray-500">
                        Pembina: <strong>{{ $ekskul->pembina->name ?? '-' }}</strong>
                    </p>
                </div>

                <form action="{{ route('siswa.pendaftaran.store', $ekskul->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit"
                            class="w-full py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition">
                        Daftar
                    </button>
                </form>
            </div>
        @empty
            <div class="col-span-full text-gray-600">
                Kamu telah mendaftar semua ekskul yang tersedia.
            </div>
        @endforelse
    </div>
@endsection
