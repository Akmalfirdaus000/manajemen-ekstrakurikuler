<?php

namespace App\Http\Controllers\Siswa;

use Carbon\Carbon;
use App\Models\Ekskul;
use App\Models\Absensi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class KehadiranController extends Controller
{
   public function index()
{
    $user = Auth::user();
    $today = Carbon::now()->format('Y-m-d');
    $hariIni = Carbon::now()->locale('id')->isoFormat('dddd');

    // Ekskul yang sedang aktif hari ini
    $ekskulsHariIni = $user->pendaftaran()
        ->whereHas('ekskul.jadwals', fn($q) => $q->where('hari', $hariIni))
        ->with('ekskul.jadwals')
        ->get()
        ->pluck('ekskul');

    // Ambil semua riwayat absensi user
    $absensis = Absensi::with('ekskul')
                ->where('user_id', $user->id)
                ->orderByDesc('tanggal')
                ->get();

    // ID ekskul yang sudah diabsen hari ini
    $sudahAbsen = Absensi::where('user_id', $user->id)
                ->whereDate('tanggal', $today)
                ->pluck('ekskul_id')
                ->toArray();

    return view('siswa.kehadiran.index', compact('absensis', 'ekskulsHariIni', 'sudahAbsen'));
}

public function store(Request $request, Ekskul $ekskul)
{
    $request->validate([
        'status' => 'required|in:hadir,izin,alfa',
    ]);

    $user = Auth::user();
    $tanggal = now()->format('Y-m-d');

    $sudah = Absensi::where('user_id', $user->id)
        ->where('ekskul_id', $ekskul->id)
        ->whereDate('tanggal', $tanggal)
        ->exists();

    if ($sudah) {
        return back()->with('error', 'Kamu sudah absen hari ini untuk ekskul ini.');
    }

    Absensi::create([
        'user_id' => $user->id,
        'ekskul_id' => $ekskul->id,
        'status' => $request->status,
        'tanggal' => $tanggal,
    ]);

    return back()->with('message', 'Absen berhasil disimpan.');
}
}

