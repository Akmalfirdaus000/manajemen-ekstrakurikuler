<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    //
     protected $table = 'pengumumen';

    protected $fillable = ['judul', 'isi', 'tujuan', 'created_by'];

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
