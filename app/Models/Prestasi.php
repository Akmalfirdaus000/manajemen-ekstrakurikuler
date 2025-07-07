<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = ['user_id', 'ekskul_id', 'nama_event', 'tingkat', 'peringkat', 'tanggal'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class);
    }
    public function siswa()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
