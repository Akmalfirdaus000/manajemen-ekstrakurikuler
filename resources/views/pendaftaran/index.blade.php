@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Monitoring Pendaftaran Ekskul</h1>

@if (session('message'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full table-auto text-sm text-left">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Nama Siswa</th>
                <th class="px-4 py-3">Kelas</th>
                <th class="px-4 py-3">Ekskul</th>
                <th class="px-4 py-3">Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse ($pendaftarans as $item)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->user->name }}</td>
                    <td class="px-4 py-2">{{ $item->user->kelas->nama ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item->ekskul->nama }}</td>
                    <td class="px-4 py-2">{{ $item->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada pendaftaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
