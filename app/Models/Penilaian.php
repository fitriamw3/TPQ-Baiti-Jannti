<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'santri_id',
        'juz',
        'nama_surah',
        'ayat_mulai',
        'ayat_akhir',
        'nilai_tajwid',
        'nilai_lancar',
        'catatan'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

}
