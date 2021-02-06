<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurketMahasiswaAktifController extends Controller
{
    public function index()
    {
        return view('surketmahasiswaaktif.index');
    }
}
