<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Ekskul;
use App\Models\Pendaftaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        // $ekskuls = Ekskul::with('pembina', 'jadwal')->get();
        $ekskuls = auth()->user()->pendaftaran()->with('ekskul')->get()->pluck('ekskul');
        return view('siswa.kegiatan.index', compact('ekskuls'));
    }
    public function show(Ekskul $ekskul)
{
    $user = Auth::user();

    // Pastikan siswa memang ikut ekskul ini
    $ikut = Pendaftaran::where('user_id', $user->id)
                       ->where('ekskul_id', $ekskul->id)
                       ->exists();

    if (! $ikut) {
        abort(403, 'Kamu tidak terdaftar dalam ekskul ini.');
    }

    $pengumuman = $ekskul->pengumuman()->latest()->get();
    $anggota = $ekskul->pendaftaran()->with('siswa')->get();
    $jadwal = $ekskul->jadwals;

    return view('siswa.kegiatan.show', compact('ekskul', 'pengumuman', 'anggota', 'jadwal'));
}
}
