<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_asets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kategori_aset');
            $table->string('nama_kategori_aset');
            $table->unsignedBigInteger('id_tipe_aset')->nullable();
            $table->foreign('id_tipe_aset')->references('id')->on('tipe_asets');
            $table->string('deskripsi_kategori_aset');
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
        Schema::dropIfExists('kategori_asets');
    }
}
