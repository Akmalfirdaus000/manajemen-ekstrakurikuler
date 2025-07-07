<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
 public function index()
{
    $pendaftarans = \App\Models\Pendaftaran::with(['user.kelas', 'ekskul'])->latest()->get();
    return view('pendaftaran.index', compact('pendaftarans'));
}

}
