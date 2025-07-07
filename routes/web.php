<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Guru\AbsensiController;
use App\Http\Controllers\Guru\PesertaController;
use App\Http\Controllers\Guru\PrestasiController;
use App\Http\Controllers\Guru\DashboardController;
use App\Http\Controllers\Siswa\KegiatanController;
use App\Http\Controllers\Siswa\KehadiranController;
use App\Http\Controllers\Siswa\JadwalSayaController;
use App\Http\Controllers\Siswa\NilaiPrestasiController;
use App\Http\Controllers\Siswa\SiswaPengumumanController;
use App\Http\Controllers\Siswa\SiswaPendaftaranController;

// Halaman Utama (sementara)
Route::get('/', function () {
    return view('welcome');
});


// ===================== AUTH =====================
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login/action', 'login_action')->name('login.action');

    Route::get('register', 'register')->name('register');
    Route::post('register/action', 'register_action')->name('register.action');

    Route::get('logout', 'logout')->name('logout');
});


// ===================== DASHBOARD =====================
Route::middleware(['auth', 'admin'])->get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
// Route::middleware(['auth', 'guru'])->get('/guru/dashboard', fn() => view('guru.dashboard'))->name('guru.dashboard');
// Route::middleware(['auth', 'siswa'])->get('/siswa/dashboard', fn() => view('siswa.dashboard'))->name('siswa.dashboard');
Route::middleware(['auth', 'guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::middleware(['auth', 'guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// ===================== ADMIN =====================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Manajemen User (Guru & Siswa)
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // (Opsional) Placeholder menu admin lainnya
    Route::get('/kegiatan', fn() => 'Manajemen Kegiatan')->name('kegiatan');
    Route::get('/jadwal', fn() => 'Manajemen Jadwal')->name('jadwal');
    Route::get('/master', fn() => 'Data Master')->name('master');
    Route::get('/pendaftaran', fn() => 'Monitoring Pendaftaran')->name('pendaftaran');
    Route::get('/absensi', fn() => 'Monitoring Absensi')->name('absensi');
    Route::get('/pengumuman', fn() => 'Pengumuman Umum')->name('pengumuman');
    Route::get('/laporan', fn() => 'Laporan Sistem')->name('laporan');
    Route::get('/profil', fn() => 'Profil Admin')->name('profil');
});


// ===================== KEGIATAN EKSKUL (Admin & Guru) =====================
Route::middleware(['auth'])->prefix('ekskul')->name('ekskul.')->group(function () {
    Route::get('/', [EkskulController::class, 'index'])->name('index');
    Route::get('/create', [EkskulController::class, 'create'])->name('create');
    Route::post('/', [EkskulController::class, 'store'])->name('store');
    Route::get('/{ekskul}/edit', [EkskulController::class, 'edit'])->name('edit');
    Route::put('/{ekskul}', [EkskulController::class, 'update'])->name('update');
    Route::delete('/{ekskul}', [EkskulController::class, 'destroy'])->name('destroy');
});
Route::middleware(['auth'])->prefix('jadwal')->name('jadwal.')->group(function () {
    Route::get('/', [JadwalController::class, 'index'])->name('index');
    Route::get('/create', [JadwalController::class, 'create'])->name('create');
    Route::post('/', [JadwalController::class, 'store'])->name('store');
    Route::get('/{jadwal}/edit', [JadwalController::class, 'edit'])->name('edit');
    Route::put('/{jadwal}', [JadwalController::class, 'update'])->name('update');
    Route::delete('/{jadwal}', [JadwalController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Data Master: Kelas
    Route::get('/kelas', [MasterController::class, 'kelasIndex'])->name('kelas.index');
    Route::post('/kelas', [MasterController::class, 'kelasStore'])->name('kelas.store');
    Route::put('/kelas/{kelas}', [MasterController::class, 'kelasUpdate'])->name('kelas.update');
    Route::delete('/kelas/{kelas}', [MasterController::class, 'kelasDestroy'])->name('kelas.destroy');

    // Data Master: Semester
    Route::get('/semester', [MasterController::class, 'semesterIndex'])->name('semester.index');
    Route::post('/semester', [MasterController::class, 'semesterStore'])->name('semester.store');
    Route::put('/semester/{semester}', [MasterController::class, 'semesterUpdate'])->name('semester.update');
    Route::delete('/semester/{semester}', [MasterController::class, 'semesterDestroy'])->name('semester.destroy');

    // Data Master: Tahun Ajaran
    Route::get('/tahun-ajaran', [MasterController::class, 'tahunIndex'])->name('tahun.index');
    Route::post('/tahun-ajaran', [MasterController::class, 'tahunStore'])->name('tahun.store');
    Route::put('/tahun-ajaran/{tahunAjaran}', [MasterController::class, 'tahunUpdate'])->name('tahun.update');
    Route::delete('/tahun-ajaran/{tahunAjaran}', [MasterController::class, 'tahunDestroy'])->name('tahun.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('pengumuman.')->group(function () {
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('index');
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('create');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('store');
    Route::delete('/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])->name('destroy');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.laporan.')->group(function () {
    Route::get('/siswa-ekskul', [LaporanController::class, 'siswaEkskul'])->name('siswa_ekskul');
    Route::get('/rekap-absensi', [LaporanController::class, 'rekapAbsensi'])->name('rekap_absensi');
    Route::get('/rekap-nilai', [LaporanController::class, 'rekapNilai'])->name('rekap_nilai');
    Route::get('/prestasi', [LaporanController::class, 'prestasi'])->name('prestasi');
});

Route::middleware(['auth', 'guru'])->prefix('guru')->name('guru.')->group(function () {
$dummy = fn() => 'Sedang dikembangkan...';
    // Route::get('/kegiatan', $dummy)->name('kegiatan');
      Route::get('/kegiatan', [EkskulController::class, 'indexGuru'])->name('kegiatan');
    // Route::get('/jadwal', $dummy)->name('jadwal');
     Route::get('/jadwal', [\App\Http\Controllers\JadwalController::class, 'index'])->name('jadwal');
    // Route::get('/peserta', $dummy)->name('peserta');
      Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta');

    // Route::get('/absensi', $dummy)->name('absensi');
     Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::get('/penilaian', $dummy)->name('penilaian');
    Route::get('/umpan', $dummy)->name('umpan');

    // Route::get('/pengumuman', $dummy)->name('pengumuman');
    Route::get('/laporan', $dummy)->name('laporan');

    Route::get('/profil', $dummy)->name('profil');
});
Route::prefix('guru')->middleware(['auth', 'guru'])->name('guru.')->group(function () {
    Route::get('/penilaian', [NilaiController::class, 'index'])->name('penilaian');
    Route::post('/penilaian', [NilaiController::class, 'store'])->name('penilaian.store');


});

Route::prefix('guru')->middleware(['auth', 'guru'])->name('guru.')->group(function () {
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
    Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
    Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::get('/prestasi/{prestasi}/edit', [PrestasiController::class, 'edit'])->name('prestasi.edit');
    Route::put('/prestasi/{prestasi}', [PrestasiController::class, 'update'])->name('prestasi.update');
    Route::delete('/prestasi/{prestasi}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');
});
// Dapat digunakan oleh semua role
Route::middleware('auth')->group(function () {
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
});




Route::middleware(['auth', 'siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');

    // lainnya (sementara dummy)
    $dummy = fn() => '🛠 Sedang dikembangkan...';
    // Route::get('/kegiatan', $dummy)->name('kegiatan');
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
    Route::get('/kegiatan/{ekskul}', [KegiatanController::class, 'show'])->name('kegiatan.show');


    // Route::get('/pendaftaran', $dummy)->name('pendaftaran');
    Route::get('/pendaftaran', [SiswaPendaftaranController::class, 'index'])->name('pendaftaran');
    Route::post('/pendaftaran/{ekskul}', [SiswaPendaftaranController::class, 'store'])->name('pendaftaran.store');
    // Route::get('/jadwal', $dummy)->name('jadwal');
    Route::get('/jadwal', [JadwalSayaController::class, 'index'])->name('jadwal.index');
    // Route::get('/kehadiran', $dummy)->name('kehadiran');
       Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadiran.index');
         Route::post('/kehadiran/{ekskul}', [KehadiranController::class, 'store'])->name('kehadiran.store');
    // Route::get('/umpan', $dummy)->name('umpan');
    // Route::get('/nilai', $dummy)->name('nilai');
     Route::get('/nilai', [NilaiPrestasiController::class, 'nilai'])->name('nilai');
    Route::get('/prestasi', [NilaiPrestasiController::class, 'prestasi'])->name('prestasi');
    // Route::get('/pengumuman', $dummy)->name('pengumuman');
    Route::get('/pengumuman', [SiswaPengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/profil', $dummy)->name('profil');
});


