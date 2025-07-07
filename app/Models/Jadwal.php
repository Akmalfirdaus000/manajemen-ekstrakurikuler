<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ekskul_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
    ];

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class);
    }


}

