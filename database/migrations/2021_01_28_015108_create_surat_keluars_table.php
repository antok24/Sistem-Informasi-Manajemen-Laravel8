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
            $table->string('nomor_surat', 50);
            $table->text('tujuan_kepada');
            $table->text('alamat_surat',20);
            $table->text('perihal');
            $table->string('lampiran');
            $table->date('tanggal_surat');
            $table->string('file_surat_keluar');
            $table->string('user_create');
            $table->string('user_update');
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
