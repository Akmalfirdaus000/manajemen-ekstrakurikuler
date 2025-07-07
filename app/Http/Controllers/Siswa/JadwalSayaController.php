<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class JadwalSayaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil ID ekskul yang diikuti siswa
        $ekskulIds = $user->pendaftaran()->pluck('ekskul_id');

        // Ambil semua jadwal ekskul tersebut, urutkan berdasarkan hari dan jam
        $jadwals = Jadwal::whereIn('ekskul_id', $ekskulIds)
                         ->with('ekskul')
                         ->orderBy('hari')
                         ->orderBy('jam_mulai')
                         ->get();

        return view('siswa.jadwal.index', compact('jadwals'));
    }
}

