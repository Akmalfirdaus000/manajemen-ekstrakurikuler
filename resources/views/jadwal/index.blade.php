{{-- @extends('layouts.admin') --}}
@extends(auth()->user()->role === 'guru' ? 'layouts.guru' : 'layouts.admin')


@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Manajemen Jadwal Ekskul</h1>
    <a href="{{ route('jadwal.create') }}"
       class="inline-flex items-center bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">
        <i data-lucide="plus-circle" class="w-5 h-5 mr-2"></i> Tambah Jadwal
    </a>
</div>

@if(session('message'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif

<div class="overflow-x-auto bg-white shadow rounded-lg">
    <table class="w-full table-auto text-sm text-left border-collapse">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3 font-semibold text-gray-600">#</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Kegiatan</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Hari</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Jam</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Lokasi</th>
                <th class="px-4 py-3 font-semibold text-gray-600 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($jadwals as $jadwal)
                <tr>
                    <td class="px-4 py-3">{{ $loop->iteration + ($jadwals->currentPage() - 1) * $jadwals->perPage() }}</td>
                    <td class="px-4 py-3">{{ $jadwal->ekskul->nama }}</td>
                    <td class="px-4 py-3">{{ $jadwal->hari }}</td>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                    <td class="px-4 py-3">{{ $jadwal->lokasi ?? '-' }}</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('jadwal.edit', $jadwal->id) }}"
                           class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                            Edit
                        </a>
                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-3 text-center text-gray-500">Belum ada jadwal kegiatan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $jadwals->links() }}
</div>

<script>
    lucide.createIcons();
</script>
@endsection
