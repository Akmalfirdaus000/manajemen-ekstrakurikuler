{{-- siswa/nilai/index.blade.php --}}
@extends('layouts.siswa')
@section('content')
<h1 class="text-xl font-bold text-red-600 mb-4">Nilai Ekstrakurikuler</h1>
@if($nilai->isEmpty())
    <p class="text-gray-500">Belum ada nilai yang diberikan.</p>
@else
    <table class="w-full text-sm bg-white shadow rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Ekskul</th>
                <th class="px-4 py-2 text-left">Nilai</th>
                <th class="px-4 py-2 text-left">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilai as $n)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $n->ekskul->nama ?? '-' }}</td>
                <td class="px-4 py-2">{{ $n->nilai }}</td>
                <td class="px-4 py-2">{{ $n->deskripsi ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
