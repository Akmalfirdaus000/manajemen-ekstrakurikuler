<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
 protected $fillable = [
    'name', 'email', 'password', 'role', 'kelas', 'no_induk', 'nip', 'foto',
];
public function ekskuls()
{
    return $this->hasMany(Ekskul::class, 'pembina_id');
}
public function pendaftarans()
{
    return $this->hasMany(Pendaftaran::class);
}
public function pendaftaran()
{
    return $this->hasMany(\App\Models\Pendaftaran::class);
}

public function kelas()
{
    return $this->belongsTo(Kelas::class);
}





    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
