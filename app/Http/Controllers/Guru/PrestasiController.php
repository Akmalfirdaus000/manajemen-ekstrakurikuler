<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;
use App\Models\Prestasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $ekskulIds = auth()->user()->ekskuls->pluck('id');
        $prestasis = Prestasi::with(['siswa', 'ekskul'])
                        ->whereIn('ekskul_id', $ekskulIds)
                        ->latest()->get();

        return view('guru.penilaian.prestasi-index', compact('prestasis'));
    }

public function create(Request $request)
{
    $ekskuls = auth()->user()->ekskuls;

    $siswaList = collect();
    if ($request->has('ekskul_id')) {
        $siswaList = \App\Models\Pendaftaran::with('siswa')
            ->where('ekskul_id', $request->ekskul_id)
            ->get();
    }

    return view('guru.penilaian.prestasi', compact('ekskuls', 'siswaList'));
}


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'ekskul_id' => 'nullable|exists:ekskuls,id',
            'nama_event' => 'required|string|max:100',
            'tingkat' => 'required|string|max:100',
            'peringkat' => 'required|string|max:50',
            'tanggal' => 'required|date',
        ]);

        Prestasi::create($request->all());

        return redirect()->route('guru.prestasi')->with('message', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        $this->authorizeAkses($prestasi);

        $ekskuls = auth()->user()->ekskuls;
        return view('guru.penilaian.prestasi-edit', compact('prestasi', 'ekskuls'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $this->authorizeAkses($prestasi);

        $request->validate([
            'nama_event' => 'required|string|max:100',
            'tingkat' => 'required|string|max:100',
            'peringkat' => 'required|string|max:50',
            'tanggal' => 'required|date',
        ]);

        $prestasi->update($request->all());

        return redirect()->route('guru.prestasi')->with('message', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        $this->authorizeAkses($prestasi);
        $prestasi->delete();

        return back()->with('message', 'Prestasi berhasil dihapus.');
    }

    private function authorizeAkses(Prestasi $prestasi)
    {
        if (!$prestasi->ekskul || $prestasi->ekskul->pembina_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }
    }
}


