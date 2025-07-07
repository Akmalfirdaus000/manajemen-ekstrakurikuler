@extends('layouts.guru')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Peserta Ekskul</h1>

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-100 border-b text-gray-600">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama Siswa</th>
                <th class="px-4 py-2">Kelas</th>
                <th class="px-4 py-2">Ekskul</th>
                <th class="px-4 py-2">Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach ($peserta as $p)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $p->siswa->name }}</td>
                    <td class="px-4 py-2">{{ $p->siswa->kelas->nama ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $p->ekskul->nama }}</td>
                    <td class="px-4 py-2">{{ $p->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
