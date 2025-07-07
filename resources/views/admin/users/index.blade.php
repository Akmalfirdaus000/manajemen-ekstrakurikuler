@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Manajemen User</h1>
    <a href="{{ route('admin.users.create') }}"
       class="inline-flex items-center bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">
        <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i> Tambah User
    </a>
</div>

@if(session('message'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
        {{ session('message') }}
    </div>
@endif

<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="w-full table-auto text-sm text-left border-collapse">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3 font-semibold text-gray-600">#</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Nama</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Email</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Role</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Kelas</th>
                <th class="px-4 py-3 font-semibold text-gray-600">No Induk / NIP</th>
                <th class="px-4 py-3 font-semibold text-gray-600 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($users as $user)
                <tr>
                    <td class="px-4 py-3">{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3 capitalize">{{ $user->role }}</td>
                    <td class="px-4 py-3">{{ $user->kelas ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $user->role === 'guru' ? $user->nip : $user->no_induk }}</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                           class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                            Edit
                        </a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?');">
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
                    <td colspan="7" class="px-4 py-3 text-center text-gray-500">Belum ada data user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $users->links() }}
</div>

<script>
    lucide.createIcons();
</script>
@endsection
