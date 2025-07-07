<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $ekskulIds = auth()->user()->ekskuls->pluck('id');

        $absensis = Absensi::with(['siswa', 'ekskul'])
                    ->whereIn('ekskul_id', $ekskulIds)
                    ->orderBy('tanggal', 'desc')
                    ->get();

        return view('guru.absensi.index', compact('absensis'));
    }
}
