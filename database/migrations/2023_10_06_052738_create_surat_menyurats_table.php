<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMenyuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_menyurats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_surat');
            $table->string('nama_surat');
            $table->string('deskripsi');
            $table->string('lampiran_dokumen');
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
        Schema::dropIfExists('surat_menyurats');
    }
}
