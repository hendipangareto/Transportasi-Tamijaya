<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_asets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset');
            $table->string('nama_aset');
            $table->unsignedBigInteger('id_kategori_aset')->nullable();
            $table->foreign('id_kategori_aset')->references('id')->on('kategori_asets');
            $table->string('merk_aset');
            $table->string('spesifikasi_aset');
            $table->string('catatan_aset');
            $table->date('tanggal_beli_aset');
            $table->date('tanggal_pakai_aset');
            $table->string('lokasi_awal_aset');
            $table->string('pajak_aset');
            $table->unsignedBigInteger('id_kategori_pajak')->nullable();
            $table->foreign('id_kategori_pajak')->references('id')->on('kategori_pajaks');
            $table->string('aset_tidak_berwujud');
            $table->unsignedBigInteger('id_metode_penyusutan')->nullable();
            $table->foreign('id_metode_penyusutan')->references('id')->on('metode_penyusutans');
            $table->string('akun_aset');
            $table->string('akun_akumulasi_penyusutan_aset');
            $table->string('akun_beban_penyusutan_aset');
            $table->string('lampiran_aset');
            $table->string('kuantitas');
            $table->unsignedBigInteger('id_satuan')->nullable();
            $table->foreign('id_satuan')->references('id')->on('satuans');
            $table->date('umur_aset');
            $table->decimal('rasio', 5, 4);
            $table->string('nilai_sisa');
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
        Schema::dropIfExists('data_asets');
    }
}
