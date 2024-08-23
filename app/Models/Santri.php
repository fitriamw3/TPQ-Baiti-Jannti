<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    protected $table = 'santri';
    protected $guarded = [];

    public function hafalans()
    {
        return $this->hasMany(Hafalan::class, 'santri_id');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
