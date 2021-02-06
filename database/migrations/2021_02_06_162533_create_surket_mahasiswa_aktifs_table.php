<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurketMahasiswaAktifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_surket_mahasiswa_aktif', function (Blueprint $table) {
            $table->id();
            $table->char('nomor_surat');
            $table->char('kode_surat');
            $table->char('tahun');
            $table->char('nim', 9);
            $table->char('masa', 5);
            $table->string('nama_mahasiswa');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('program_studi');
            $table->string('fakultas');
            $table->string('alamat_mahasiswa');
            $table->char('mr_awal', 5);
            $table->char('mr_akhir', 5);
            $table->char('nip_ttd', 20);
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
        Schema::dropIfExists('t_surket_mahasiswa_aktif');
    }
}
