<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_lembur', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->date('tanggal_lembur');
            $table->text('kegiatan');
            $table->text('uraian_kegiatan');
            $table->string('satuan');
            $table->string('volume');
            $table->time('masuk');
            $table->time('pulang');
            $table->char('total_jam');
            $table->char('status');
            $table->string('kode_upbjj');
            $table->char('nip_atasan');
            $table->char('user_create');
            $table->char('user_update')->nullable();
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
        Schema::dropIfExists('t_lembur');
    }
}
