<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomorSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_nomor_surat', function (Blueprint $table) {
            $table->id();
            $table->char('nomor_surat',8);
            $table->char('tahun',4);
            $table->char('status',4)->nullable();
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
        Schema::dropIfExists('m_nomor_surat');
    }
}
