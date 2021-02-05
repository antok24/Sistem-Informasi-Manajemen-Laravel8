<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'm_jabatan';

    protected $fillable = [
        'kode_jabatan',
        'nama_jabatan',
        'nama_jabatan_lama'
    ];
}
