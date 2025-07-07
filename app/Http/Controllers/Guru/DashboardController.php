<?php

namespace App\Http\Controllers\Guru;
namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Jadwal;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $ekskulIds = $user->ekskuls()->pluck('id');
        $totalEkskul = $ekskulIds->count();
        $totalPeserta = Pendaftaran::whereIn('ekskul_id', $ekskulIds)->count();

        $jadwalBerikutnya = Jadwal::whereIn('ekskul_id', $ekskulIds)
            ->whereDate('tanggal', '>=', now())
            ->orderBy('tanggal')
            ->first();

        $pengumuman = Pengumuman::whereIn('tujuan', ['guru', 'semua'])
            ->latest()
            ->take(3)
            ->get();

        return view('guru.dashboard', compact('totalEkskul', 'totalPeserta', 'jadwalBerikutnya', 'pengumuman'));
    }
}
