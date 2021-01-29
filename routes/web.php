<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratMasukController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware('auth')->group(function(){

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/surat-masuk/create', [SuratMasukController::class, 'create'])->name('suratmasuk.create');
    Route::post('/surat-masuk/simpan', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
    Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('suratmasuk');
});
