<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiSurat extends Model
{
    use HasFactory;

    protected $table = 't_klasifikasi_surat';
    protected $fillable = [
        'kode_klasifikasi',
        'jenis_arsip',
        'keterangan_aktif',
        'keterangan_inaktif',
        'keterangan',
        'user_create',
        'user_update'
    ];
}
