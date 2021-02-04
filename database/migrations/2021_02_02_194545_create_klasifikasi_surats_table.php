<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlasifikasiSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_klasifikasi_surat', function (Blueprint $table) {
            $table->id();
            $table->string('kode_klasifikasi');
            $table->string('jenis_arsip');
            $table->string('keterangan_aktif')->nullable();
            $table->string('keterangan_inaktif')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('user_create');
            $table->string('user_update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_klasifikasi_surat');
    }
}
