<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;

    protected $table = 't_pejabat';

    protected $fillable = [
        'nik',
        'nama',
        'kode_jabatan',
        'kode_upbjj',
        'status'
    ];
}
