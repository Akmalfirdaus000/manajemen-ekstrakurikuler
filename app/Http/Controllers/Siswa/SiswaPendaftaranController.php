<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Ekskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiswaPendaftaranController extends Controller
{
     public function index()
    {
        $user = Auth::user();

        // Ambil ID ekskul yang sudah didaftari siswa ini
        $ekskulTerdaftar = $user->pendaftaran()->pluck('ekskul_id');

        // Ambil semua ekskul yang belum didaftari
        $ekskuls = Ekskul::whereNotIn('id', $ekskulTerdaftar)
                    ->with('pembina')
                    ->get();

        return view('siswa.pendaftaran.index', compact('ekskuls'));
    }

    public function store(Ekskul $ekskul)
    {
        $user = Auth::user();

        // Cek jika sudah terdaftar
        $sudah = Pendaftaran::where('user_id', $user->id)
                            ->where('ekskul_id', $ekskul->id)
                            ->exists();

        if ($sudah) {
            return back()->with('error', 'Kamu sudah terdaftar di ekskul ini.');
        }

        // Simpan pendaftaran
        Pendaftaran::create([
            'user_id' => $user->id,
            'ekskul_id' => $ekskul->id,
        ]);

        return redirect()->route('siswa.pendaftaran')->with('message', 'Berhasil mendaftar ekskul.');
    }
}
