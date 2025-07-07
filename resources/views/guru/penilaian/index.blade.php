@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Penilaian Siswa Ekskul</h1>

@if(session('message'))
    <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif

@if ($ekskuls->count() === 0)
    <div class="bg-white p-6 rounded shadow text-gray-600">
        Anda belum memiliki ekskul untuk dinilai.
    </div>
@else
    <form action="{{ route('guru.penilaian.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Pilih Ekskul --}}
        <div>
            <label for="ekskul_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Ekskul</label>
            <select name="ekskul_id" id="ekskul_id"
                    class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500"
                    onchange="this.form.submit()">
                <option value="">-- Pilih Ekskul --</option>
                @foreach ($ekskuls as $ekskul)
                    <option value="{{ $ekskul->id }}" {{ old('ekskul_id') == $ekskul->id ? 'selected' : '' }}>
                        {{ $ekskul->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Daftar Siswa --}}
        @php
            $selected = old('ekskul_id');
            $peserta = $selected ? \App\Models\Pendaftaran::with('siswa')->where('ekskul_id', $selected)->get() : collect();
        @endphp

        @if ($peserta->count())
            <div class="bg-white p-6 rounded shadow border">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 border-b text-gray-600">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Nama Siswa</th>
                            <th class="px-4 py-2">Nilai</th>
                            <th class="px-4 py-2">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($peserta as $item)
                            <tr>
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $item->siswa->name }}</td>
                                <td class="px-4 py-2 w-32">
                                    <input type="number" name="nilai[{{ $item->siswa->id }}]" min="0" max="100"
                                           value="{{ old("nilai.{$item->siswa->id}") }}"
                                           class="w-full border px-2 py-1 rounded">
                                </td>
                                <td class="px-4 py-2">
                                    <input type="text" name="deskripsi[{{ $item->siswa->id }}]"
                                           value="{{ old("deskripsi.{$item->siswa->id}") }}"
                                           class="w-full border px-2 py-1 rounded">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4 text-right">
                    <button type="submit"
                            class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                        Simpan Penilaian
                    </button>
                </div>
            </div>
        @endif
    </form>
@endif
@endsection
