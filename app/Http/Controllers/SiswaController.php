<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\Pengumuman;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Ambil semua ekskul yang didaftarkan siswa
        $ekskulIds = $user->pendaftaran()->pluck('ekskul_id');

        // Jumlah ekskul yang diikuti
        $jumlahEkskul = $ekskulIds->count();

        // Ambil jadwal terdekat dari ekskul yang diikuti
      $jadwalTerdekat = \App\Models\Jadwal::whereIn('ekskul_id', $ekskulIds)
    ->orderBy('tanggal')
    ->orderBy('created_at')
    ->with('ekskul')
    ->first();


        // Ambil pengumuman terbaru untuk siswa
        $pengumumanTerbaru = Pengumuman::whereIn('tujuan', ['siswa', 'semua'])
            ->latest()
            ->first();

        return view('siswa.dashboard', compact(
            'jumlahEkskul',
            'jadwalTerdekat',
            'pengumumanTerbaru'
        ));
    }
}
