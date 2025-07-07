<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaPengumumanController extends Controller
{
        public function index()
    {
        $pengumuman = Pengumuman::with('pembuat')
                        ->whereIn('tujuan', ['siswa', 'semua'])
                        ->orderByDesc('created_at')
                        ->get();

        return view('siswa.pengumuman.index', compact('pengumuman'));
    }

}
