<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Ekskul;
use App\Models\Prestasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // 🧑‍🎓 1. Laporan Daftar Siswa Ekskul
    public function siswaEkskul()
    {
        $pendaftarans = Pendaftaran::with(['user.kelas', 'ekskul'])->get();
        return view('laporan.siswa_ekskul', compact('pendaftarans'));
    }


    // 📅 2. Rekap Absensi
public function rekapAbsensi()
{
    $rekap = Ekskul::withCount([
        'pendaftarans as jumlah_siswa',
        'absensis as total_absen' => function ($q) {
            $q->where('status', 'hadir'); // bisa diubah jadi semua status jika perlu
        },
    ])->get();

    return view('admin.laporan.rekap_absensi', compact('rekap'));
}

    // 📝 3. Rekap Nilai (opsional)

public function rekapNilai()
{
    $nilais = Nilai::with(['user.kelas', 'ekskul'])->orderBy('ekskul_id')->get();

    return view('admin.laporan.rekap_nilai', compact('nilais'));
}


    // 🏆 4. Laporan Prestasi (opsional)
    public function prestasi()
{
    $prestasis = Prestasi::with(['user.kelas', 'ekskul'])->latest()->get();

    return view('admin.laporan.prestasi', compact('prestasis'));
}
}
