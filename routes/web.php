<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware('auth')->group(function(){

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/surat-masuk/create', [SuratMasukController::class, 'formadd'])->name('suratmasuk.create');
    Route::post('/surat-masuk/simpan', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
    Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('suratmasuk');

    Route::get('/surat-keluar',[SuratKeluarController::class, 'index'])->name('suratkeluar');
    Route::get('/surat-keluar/create',[SuratKeluarController::class, 'form'])->name('suratkeluar.create');
    Route::post('/surat-keluar/simpan',[SuratKeluarController::class, 'simpan'])->name('suratkeluar.simpan');
});
