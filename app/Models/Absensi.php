<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model

{
    protected $fillable = [
    'user_id',
    'ekskul_id',
    'status',
    'tanggal',
];

    // Absensi.php
public function siswa() {
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}
public function ekskul() {
    return $this->belongsTo(\App\Models\Ekskul::class);
}

}
