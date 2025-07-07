@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Jadwal Kegiatan Ekskul</h1>

<a href="{{ route('guru.jadwal.create') }}"
   class="inline-block mb-4 px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700">
   + Tambah Jadwal
</a>

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100 border-b text-gray-600">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Ekskul</th>
                <th class="px-4 py-2">Hari</th>
                <th class="px-4 py-2">Jam</th>
                <th class="px-4 py-2">Lokasi</th>
                <th class="px-4 py-2">Judul</th>
                <th class="px-4 py-2">Deskripsi</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $jadwal->ekskul->nama }}</td>
                    <td class="px-4 py-2">{{ $jadwal->hari }}</td>
                    <td class="px-4 py-2">
                        {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} -
                        {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                    </td>
                    <td class="px-4 py-2">{{ $jadwal->lokasi ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $jadwal->judul ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $jadwal->deskripsi ?? '-' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('guru.jadwal.edit', $jadwal) }}"
                           class="text-blue-600 hover:underline text-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
