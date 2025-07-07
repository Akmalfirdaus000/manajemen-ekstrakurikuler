<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $jadwals = $user->role === 'admin'
            ? Jadwal::with('ekskul')->latest()->paginate(10)
            : Jadwal::whereHas('ekskul', fn($q) => $q->where('pembina_id', $user->id))
                    ->with('ekskul')->latest()->paginate(10);

        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $user = Auth::user();
        $ekskuls = $user->role === 'admin'
            ? Ekskul::all()
            : $user->ekskuls;

        return view('jadwal.create', compact('ekskuls'));
    }

    public function store(Request $request)
    {
      $request->validate([
    'ekskul_id' => 'required|exists:ekskuls,id',
    'hari' => 'required|string|max:20',
    'jam_mulai' => 'required',
    'jam_selesai' => 'required|after:jam_mulai',
    'lokasi' => 'nullable|string|max:100',
    'judul' => 'nullable|string|max:100',
    'deskripsi' => 'nullable|string',
]);


        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('message', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $this->authorizeEdit($jadwal);

        $user = Auth::user();
        $ekskuls = $user->role === 'admin'
            ? Ekskul::all()
            : $user->ekskuls;

        return view('jadwal.edit', compact('jadwal', 'ekskuls'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $this->authorizeEdit($jadwal);

      $request->validate([
    'ekskul_id' => 'required|exists:ekskuls,id',
    'hari' => 'required|string|max:20',
    'jam_mulai' => 'required',
    'jam_selesai' => 'required|after:jam_mulai',
    'lokasi' => 'nullable|string|max:100',
    'judul' => 'nullable|string|max:100',
    'deskripsi' => 'nullable|string',
]);

$jadwal->update($request->all());


        return redirect()->route('jadwal.index')->with('message', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $this->authorizeEdit($jadwal);

        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('message', 'Jadwal berhasil dihapus.');
    }

    private function authorizeEdit(Jadwal $jadwal)
    {
        $user = Auth::user();

        if ($user->role === 'guru' && $jadwal->ekskul->pembina_id !== $user->id) {
            abort(403, 'Anda tidak memiliki akses ke jadwal ini.');
        }
    }
}

