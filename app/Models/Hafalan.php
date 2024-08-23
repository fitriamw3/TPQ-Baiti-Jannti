<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hafalan extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'surahs_id',
        'doas_id',
        'nilai',
        'jumlah_ayat'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function surah()
    {
        return $this->belongsTo(Surah::class, 'surahs_id');
    }

    public function doa()
    {
        return $this->belongsTo(Doa::class, 'doas_id');
    }
}
