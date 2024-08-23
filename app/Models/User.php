<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'nama',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function guru()
    {
        return $this->hasOne(Guru::class, 'nama_guru', 'nama');
    }

    public function santri()
    {
        return $this->hasOne(Santri::class, 'nama_santri', 'nama');
    }

    public function hafalans()
    {
        return $this->hasMany(Hafalan::class, 'santri_id');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'santri_id');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'santri_id');
    }
}
