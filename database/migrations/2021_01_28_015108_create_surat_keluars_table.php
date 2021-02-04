<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->char('nomor_surat', 8);
            $table->string('nomor_ref_surat', 20);
            $table->char('tahun_surat', 4);
            $table->text('tujuan_kepada');
            $table->text('alamat_surat',20);
            $table->text('perihal');
            $table->string('lampiran');
            $table->date('tanggal_surat');
            $table->string('file_surat_keluar');
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
        Schema::dropIfExists('t_surat_keluar');
    }
}
