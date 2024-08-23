<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doa extends Model
{
    use HasFactory;

    protected $fillable = ['doa'];

    public function hafalans()
    {
        return $this->hasMany(Hafalan::class, 'doas_id');
    }
}
