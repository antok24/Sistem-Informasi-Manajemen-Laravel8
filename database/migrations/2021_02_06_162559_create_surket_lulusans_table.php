<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurketLulusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_surket_lulusan', function (Blueprint $table) {
            $table->id();
            $table->char('nomor_surat');
            $table->char('kode_surat');
            $table->char('tahun');
            $table->char('nim', 9);
            $table->char('masa', 5);
            $table->string('nama_mahasiswa');
            $table->char('kode_program_studi');
            $table->string('program_studi');
            $table->string('singkatan_fakultas');
            $table->string('fakultas');
            $table->string('nama_pendidikan_akhir');
            $table->string('no_ijazah_d');
            $table->string('no_ijazah_a');
            $table->string('sks_yudisium');
            $table->string('nomor_sk_rektor');
            $table->string('tanggal_sk');
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
        Schema::dropIfExists('t_surket_lulusan');
    }
}
