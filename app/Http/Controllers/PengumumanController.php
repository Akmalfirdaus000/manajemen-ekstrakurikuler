<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    // 🔍 Admin melihat semua pengumuman
   public function index()
{
    $query = Pengumuman::with('pembuat')->latest();

    // Jika guru → hanya lihat pengumuman miliknya
    if (auth()->user()->role === 'guru') {
        $query->where('created_by', auth()->id());
    }

    $pengumuman = $query->get();

    return view('pengumuman.index', compact('pengumuman'));
}


    // 📝 Form tambah
    public function create()
    {
        return view('pengumuman.create');
    }

    // 💾 Simpan pengumuman
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tujuan' => 'required|in:siswa,guru,semua',
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tujuan' => $request->tujuan,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('pengumuman.index')->with('message', 'Pengumuman berhasil dibuat.');
    }

    // ❌ Hapus pengumuman
   public function destroy(Pengumuman $pengumuman)
{
    if (auth()->user()->role === 'guru' && $pengumuman->created_by !== auth()->id()) {
        abort(403, 'Anda tidak memiliki izin untuk menghapus ini.');
    }

    $pengumuman->delete();
    return back()->with('message', 'Pengumuman berhasil dihapus.');
}

}
