<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 't_surat_masuk';
    protected $fillable =[
        'nomor_agenda',
        'nomor_surat',
        'asal_surat',
        'sifat_surat',
        'perihal',
        'tanggal_agenda',
        'tanggal_surat',
        'status',
        'file_surat_masuk',
        'user_create',
        'user_update',
    ];
}
