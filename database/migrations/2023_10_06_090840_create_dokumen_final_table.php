<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_final', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_input');
            $table->string('no_registrasi_surat');
            $table->string('no_surat');
            $table->date('tanggal_surat');
            $table->string('pengirim_surat');
            $table->string('penerima_surat');
            $table->string('keterangan_surat');
            $table->string('lampiran_dokumen_final');
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
        Schema::dropIfExists('dokumen_final');
    }
}
