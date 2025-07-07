@extends(auth()->user()->role === 'guru' ? 'layouts.guru' : 'layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Jadwal Ekskul</h1>

<form action="{{ route('jadwal.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-3xl space-y-4">
    @csrf

    {{-- Pilih Ekskul --}}
    @if(auth()->user()->role === 'admin')
        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
            <select name="ekskul_id" required class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Ekskul --</option>
                @foreach($ekskuls as $ekskul)
                    <option value="{{ $ekskul->id }}" {{ old('ekskul_id') == $ekskul->id ? 'selected' : '' }}>
                        {{ $ekskul->nama }}
                    </option>
                @endforeach
            </select>
            @error('ekskul_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
    @else
        <input type="hidden" name="ekskul_id" value="{{ $ekskuls->first()->id }}">
    @endif

    {{-- Judul --}}
    <div>
        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Kegiatan</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
               class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
        @error('judul') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Deskripsi --}}
    <div>
        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4"
                  class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('deskripsi') }}</textarea>
        @error('deskripsi') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Hari --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Hari</label>
        <input type="text" name="hari" value="{{ old('hari') }}" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500" placeholder="Contoh: Jumat">
        @error('hari') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Jam Mulai --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Jam Mulai</label>
        <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('jam_mulai') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Jam Selesai --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Jam Selesai</label>
        <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" required
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500">
        @error('jam_selesai') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Lokasi --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Lokasi</label>
        <input type="text" name="lokasi" value="{{ old('lokasi') }}"
               class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-red-500"
               placeholder="Contoh: Aula, Lapangan Basket">
        @error('lokasi') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-between items-center pt-4">
        <a href="{{ route('jadwal.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
        <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
            Simpan Jadwal
        </button>
    </div>
</form>
@endsection
