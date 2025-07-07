<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Semester;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    // ====== KELAS ======
    public function kelasIndex()
    {
        $kelasList = Kelas::latest()->get();
        return view('admin.master.kelas', compact('kelasList'));
    }

    public function kelasStore(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:100']);
        Kelas::create(['nama' => $request->nama]);

        return back()->with('message', 'Kelas berhasil ditambahkan.');
    }

    public function kelasUpdate(Request $request, Kelas $kelas)
    {
        $request->validate(['nama' => 'required|string|max:100']);
        $kelas->update(['nama' => $request->nama]);

        return back()->with('message', 'Kelas berhasil diperbarui.');
    }

    public function kelasDestroy(Kelas $kelas)
    {
        $kelas->delete();
        return back()->with('message', 'Kelas berhasil dihapus.');
    }

    // ====== SEMESTER ======
    public function semesterIndex()
    {
        $semesters = Semester::all();
        return view('admin.master.semester', compact('semesters'));
    }

    public function semesterStore(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:20']);
        Semester::create(['nama' => $request->nama]);

        return back()->with('message', 'Semester berhasil ditambahkan.');
    }

    public function semesterUpdate(Request $request, Semester $semester)
    {
        $request->validate(['nama' => 'required|string|max:20']);
        $semester->update(['nama' => $request->nama]);

        return back()->with('message', 'Semester berhasil diperbarui.');
    }

    public function semesterDestroy(Semester $semester)
    {
        $semester->delete();
        return back()->with('message', 'Semester berhasil dihapus.');
    }

    // ====== TAHUN AJARAN ======
    public function tahunIndex()
    {
        $tahunList = TahunAjaran::latest()->get();
        return view('admin.master.tahun', compact('tahunList'));
    }

    public function tahunStore(Request $request)
    {
        $request->validate(['tahun' => 'required|string|max:15']);
        TahunAjaran::create(['tahun' => $request->tahun]);

        return back()->with('message', 'Tahun ajaran berhasil ditambahkan.');
    }

    public function tahunUpdate(Request $request, TahunAjaran $tahunAjaran)
    {
        $request->validate(['tahun' => 'required|string|max:15']);
        $tahunAjaran->update(['tahun' => $request->tahun]);

        return back()->with('message', 'Tahun ajaran berhasil diperbarui.');
    }

    public function tahunDestroy(TahunAjaran $tahunAjaran)
    {
        $tahunAjaran->delete();
        return back()->with('message', 'Tahun ajaran berhasil dihapus.');
    }
}
