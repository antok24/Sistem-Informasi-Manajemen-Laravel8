<?php

namespace App\Http\Controllers;

use App\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function create()
    {
        return view('suratmasuk.create');
    }
}
