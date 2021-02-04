<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    use HasFactory;

    protected $table = 'm_nomor_surat';
    protected $fillable = [
        'nomor_surat',
        'tahun',
        'status',
        'user_create',
        'user_update'
    ];
}
