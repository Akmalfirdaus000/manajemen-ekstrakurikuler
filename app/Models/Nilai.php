<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['user_id', 'ekskul_id', 'nilai', 'deskripsi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class);
    }
}
