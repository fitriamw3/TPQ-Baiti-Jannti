<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';

    protected $guarded = [];

    protected $fillable = [
        'nik_guru', 
        'nama_guru', 
        'tgl_lahir_guru', 
        'tmpt_lahir_guru', 
        'usia_guru', 
        'jenis_kelamin_guru', 
        'tlpn_guru', 
        'alamat_guru', 
        'foto_guru'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_guru', 'nama');
    }
}
