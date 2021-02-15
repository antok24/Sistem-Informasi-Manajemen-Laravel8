<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;

    protected $table = 't_lembur';

    protected $fillable = [
        'nip',
        'tanggal_lembur',
        'kegiatan',
        'uraian_kegiatan',
        'satuan',
        'volume',
        'masuk',
        'pulang',
        'total_jam',
        'status',
        'kode_upbjj',
        'nip_atasan',
        'user_create',
        'user_update',
    ];
}
