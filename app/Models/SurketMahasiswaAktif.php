<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurketMahasiswaAktif extends Model
{
    use HasFactory;

    protected $table = 't_surket_mahasiswa_aktif';

    protected $fillable = [
        'nomor_surat',
        'kode_surat',
        'tahun',
        'nim',
        'masa',
        'nama_mahasiswa',
        'tempat_lahir',
        'tanggal_lahir',
        'program_studi',
        'fakultas',
        'alamat_mahasiswa',
        'mr_awal',
        'mr_akhir',
        'nip_ttd',
        'user_create',
        'user_update',
    ];
}
