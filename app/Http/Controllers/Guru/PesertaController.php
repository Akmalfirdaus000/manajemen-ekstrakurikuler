<?php
namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil semua ID ekskul yang dibina oleh guru
        $ekskulIds = $user->ekskuls->pluck('id');

        // Ambil semua pendaftaran untuk ekskul tersebut
        $peserta = Pendaftaran::with(['siswa', 'ekskul'])
                    ->whereIn('ekskul_id', $ekskulIds)
                    ->latest()
                    ->get();

        return view('guru.peserta.index', compact('peserta'));
    }
}
