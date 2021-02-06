<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurketLulusan extends Model
{
    use HasFactory;

    protected $table = 't_surket_lulusan';

    protected $fillable = [
        'nomor_surat',
        'kode_surat',
        'tahun',
        'nim',
        'masa',
        'nama_mahasiswa',
        'kode_program_studi',
        'program_studi',
        'singkatan_fakultas',
        'fakultas',
        'nama_pendidikan_akhir',
        'no_ijazah_d',
        'no_ijazah_a',
        'sks_yudisium',
        'nomor_sk_rektor',
        'tanggal_sk',
        'mr_awal',
        'mr_akhir',
        'nip_ttd',
        'user_create',
        'user_update',
    ];
}
