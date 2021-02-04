<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 't_surat_keluar';
    protected $fillable = [
        'nomor_surat',
        'nomor_ref_surat',
        'tahun_surat',
        'tujuan_kepada',
        'alamat_surat',
        'perihal',
        'lampiran',
        'tanggal-surat',
        'file_surat_keluar',
        'user_create',
        'user_update',
    ];
}
