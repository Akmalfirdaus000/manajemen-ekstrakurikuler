<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Ekskul;
use App\Models\Jadwal;
use App\Models\Semester;
use App\Models\TahunAjaran;
use App\Models\Pendaftaran;
use App\Models\Pengumuman;
use App\Models\Absensi;
use App\Models\Nilai;
use App\Models\Prestasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        $admin = User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);

        // Buat guru
        $guru = User::create([
            'name' => 'Budi Guru',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'guru',
            'nip' => '19800101',
        ]);

        // Buat siswa
        $siswa = User::create([
            'name' => 'Ani Siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'siswa',
            'no_induk' => '123456',
            'kelas' => 'X ATP 1',
        ]);

        // Kelas
        $kelas = Kelas::create([
            'nama' => 'X ATP 1',
        ]);

        // Semester
        $semester = Semester::create([
            'nama' => 'Ganjil',
        ]);

        // Tahun Ajaran
        $tahunAjaran = TahunAjaran::create([
            'tahun' => '2024/2025',
        ]);

        // Ekskul
        $ekskul = Ekskul::create([
            'nama' => 'Futsal',
            'deskripsi' => 'Ekskul Futsal SMA',
            'pembina_id' => $guru->id,
            'jadwal' => 'Setiap Sabtu',
            'lokasi' => 'Lapangan Utama',
        ]);

        // Jadwal
        Jadwal::create([
            'ekskul_id' => $ekskul->id,
            'tanggal' => now()->toDateString(),
            'hari' => 'Sabtu',
            'judul' => 'Latihan Mingguan',
            'deskripsi' => 'Latihan persiapan turnamen',
            'jam_mulai' => '07:00:00',
            'jam_selesai' => '09:00:00',
            'lokasi' => 'Lapangan Utama',
        ]);

        // Pendaftaran ekskul
        Pendaftaran::create([
            'user_id' => $siswa->id,
            'ekskul_id' => $ekskul->id,
        ]);

        // Pengumuman
        Pengumuman::create([
            'judul' => 'Pertemuan Ekskul',
            'isi' => 'Jangan lupa latihan hari Sabtu!',
            'tujuan' => 'siswa',
            'created_by' => $guru->id,
            'ekskul_id' => $ekskul->id,
        ]);

        // Absensi
        Absensi::create([
            'user_id' => $siswa->id,
            'ekskul_id' => $ekskul->id,
            'status' => 'hadir',
            'tanggal' => now()->toDateString(),
        ]);

        // Nilai
        Nilai::create([
            'user_id' => $siswa->id,
            'ekskul_id' => $ekskul->id,
            'nilai' => 85,
            'deskripsi' => 'Aktif dan disiplin',
        ]);

        // Prestasi
        Prestasi::create([
            'user_id' => $siswa->id,
            'ekskul_id' => $ekskul->id,
            'nama_event' => 'Lomba Futsal Antar Sekolah',
            'tingkat' => 'Kabupaten',
            'peringkat' => 'Juara 1',
            'tanggal' => now()->subMonths(1)->toDateString(),
        ]);
    }
}
