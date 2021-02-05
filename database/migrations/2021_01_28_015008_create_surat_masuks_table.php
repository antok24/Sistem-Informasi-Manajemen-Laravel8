<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_agenda', 18);
            $table->string('nomor_surat', 50);
            $table->text('asal_surat');
            $table->char('sifat_surat',20);
            $table->text('perihal');
            $table->date('tanggal_agenda');
            $table->date('tanggal_surat');
            $table->char('status',4);
            $table->string('file_surat_masuk');
            $table->string('nip_ttd');
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
        Schema::dropIfExists('t_surat_masuk');
    }
}
