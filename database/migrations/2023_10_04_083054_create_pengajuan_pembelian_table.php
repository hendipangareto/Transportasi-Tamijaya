<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pengajuan_pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pengajuan');
            $table->string('item');
            $table->double('harga');
            $table->integer('kuantitas');
            $table->enum('cara_bayar', ['lunas','hutang']);
            $table->unsignedBigInteger('toko_id');
            $table->foreign('toko_id')->references('id')->on('tokos');
            $table->unsignedBigInteger('satuan_id');
            $table->foreign('satuan_id')->references('id')->on('satuans');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->text('catatan_pembelian')->nullable();
            $table->date('batas_waktu_pembayaran')->nullable();
            $table->date('tanggal_pengajuan')->nullable();
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
        Schema::dropIfExists('pengajuan_pembelian');
    }
}
