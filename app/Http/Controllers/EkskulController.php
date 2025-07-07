<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EkskulController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $ekskuls = $user->role === 'admin'
            ? Ekskul::with('pembina')->latest()->paginate(10)
            : Ekskul::where('pembina_id', $user->id)->with('pembina')->latest()->paginate(10);

        return view('ekskul.index', compact('ekskuls'));
    }

    public function create()
    {
        $pembinas = User::where('role', 'guru')->get();
        return view('ekskul.create', compact('pembinas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'pembina_id' => 'required|exists:users,id',
            'jadwal' => 'nullable|string|max:100',
            'lokasi' => 'nullable|string|max:100',
        ]);

        Ekskul::create($request->all());

        return redirect()->route('ekskul.index')->with('message', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Ekskul $ekskul)
    {
        $this->authorizeEdit($ekskul);

        $pembinas = User::where('role', 'guru')->get();
        return view('ekskul.edit', compact('ekskul', 'pembinas'));
    }

    public function update(Request $request, Ekskul $ekskul)
    {
        $this->authorizeEdit($ekskul);

        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'pembina_id' => 'required|exists:users,id',
            'jadwal' => 'nullable|string|max:100',
            'lokasi' => 'nullable|string|max:100',
        ]);

        $ekskul->update($request->all());

        return redirect()->route('ekskul.index')->with('message', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Ekskul $ekskul)
    {
        $this->authorizeEdit($ekskul);

        $ekskul->delete();

        return redirect()->route('ekskul.index')->with('message', 'Kegiatan berhasil dihapus.');
    }

    private function authorizeEdit(Ekskul $ekskul)
    {
        $user = Auth::user();

        if ($user->role === 'guru' && $ekskul->pembina_id !== $user->id) {
            abort(403, 'Anda tidak berhak mengubah kegiatan ini.');
        }
    }

    public function indexGuru()
{
    $user = auth()->user();

    // Menampilkan ekskul yang dibina oleh guru ini
    $ekskuls = \App\Models\Ekskul::where('pembina_id', $user->id)->get();

    return view('guru.kegiatan.index', compact('ekskuls'));
}

}
