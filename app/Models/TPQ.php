<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPQ extends Model
{
    use HasFactory;

    protected $table = 'profil';

    protected $fillable = [
        'katagori',
        'keterangan',
        'gambar',
    ];

    protected $primaryKey = 'id_profil';

}
