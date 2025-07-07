<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
           Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');     // siswa
            $table->foreignId('ekskul_id')->nullable()->constrained()->onDelete('cascade'); // opsional ekskul
            $table->string('nama_event');                                         // contoh: "Lomba Futsal"
            $table->string('tingkat');                                            // sekolah / kabupaten
            $table->string('peringkat');                                          // Juara 1 / Harapan 2
            $table->date('tanggal');                                              // tanggal prestasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
