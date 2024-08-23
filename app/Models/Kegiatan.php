<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'judul_keg',
        'isi_keg',
        'gambar',
        'tgl_keg',
        'hari_keg',
        'tempat_keg',
        'kontak_keg'
    ];

    public function registrations()
    {
        return $this->hasMany(KegiatanRegis::class, 'kegiatan_id');
    }

}
