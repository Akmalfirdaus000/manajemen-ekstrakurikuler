@extends('layouts.siswa')

@section('content')
<h1 class="text-xl font-bold text-red-600 mb-4">Prestasi Saya</h1>

@if($prestasis->isEmpty())
    <p class="text-gray-500">Belum ada prestasi yang dicatat.</p>
@else
    <table class="w-full text-sm bg-white shadow rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Nama Event</th>
                <th class="px-4 py-2 text-left">Tingkat</th>
                <th class="px-4 py-2 text-left">Peringkat</th>
                <th class="px-4 py-2 text-left">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestasis as $p)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $p->nama_event }}</td>
                <td class="px-4 py-2">{{ $p->tingkat }}</td>
                <td class="px-4 py-2">{{ $p->peringkat }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
