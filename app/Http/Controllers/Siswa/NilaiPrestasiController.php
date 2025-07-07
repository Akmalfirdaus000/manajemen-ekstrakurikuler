<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Nilai;
use App\Models\Prestasi;

class NilaiPrestasiController extends Controller
{
    public function nilai()
    {
        $user = Auth::user();
        $nilai = Nilai::with('ekskul')
                    ->where('user_id', $user->id)
                    ->orderByDesc('created_at')
                    ->get();

        return view('siswa.nilai.index', compact('nilai'));
    }

    public function prestasi()
    {
        $user = Auth::user();
        $prestasis = Prestasi::where('user_id', $user->id)
                        ->orderByDesc('tanggal')
                        ->get();

        return view('siswa.prestasi.index', compact('prestasis'));
    }
}

