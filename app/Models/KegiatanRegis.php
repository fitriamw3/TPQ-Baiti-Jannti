<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanRegis extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'nama',
        'tgl_lahir',
        'usia',
        'jenis_kelamin_santri',
        'alamat',
        'foto',
        'ayah',
        'ibu',
        'wali',
        'tlpn_ortu'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
    
}
