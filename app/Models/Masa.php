<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masa extends Model
{
    use HasFactory;

    protected $table = 't_masa';

    protected $fillable = [
        'masa',
        'tahun',
        'status'
    ];
}
