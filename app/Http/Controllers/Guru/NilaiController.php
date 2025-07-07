<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;
use App\Models\Nilai;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $ekskuls = auth()->user()->ekskuls;
        return view('guru.penilaian.index', compact('ekskuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ekskul_id' => 'required|exists:ekskuls,id',
            'nilai' => 'required|array',
        ]);

        foreach ($request->nilai as $user_id => $nilai) {
            if ($nilai !== null) {
                Nilai::updateOrCreate(
                    ['user_id' => $user_id, 'ekskul_id' => $request->ekskul_id],
                    ['nilai' => $nilai, 'deskripsi' => $request->deskripsi[$user_id] ?? null]
                );
            }
        }

        return back()->with('message', 'Nilai berhasil disimpan.');
    }
}

