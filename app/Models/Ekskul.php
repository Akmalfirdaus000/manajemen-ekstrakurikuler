<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'pembina_id',
        'jadwal',
        'lokasi',
    ];

    public function pembina()
    {
        return $this->belongsTo(User::class, 'pembina_id');
    }
    public function jadwals()
{
    return $this->hasMany(Jadwal::class);
}

public function pendaftarans()
{
    return $this->hasMany(Pendaftaran::class);
}
public function pendaftaran()
{
    return $this->hasMany(Pendaftaran::class);
}
public function absensis()
{
    return $this->hasMany(\App\Models\Absensi::class);
}
public function pengumuman()
{
    return $this->hasMany(Pengumuman::class);
}



}

