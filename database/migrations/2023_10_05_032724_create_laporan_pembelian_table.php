<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('kode_laporan_pembelian');
            $table->string('kuantitas');
            $table->unsignedBigInteger('satuan_id');
            $table->foreign('satuan_id')->references('id')->on('satuans');
            $table->double('harga_satuan');
            $table->double('diskon')->nullable();
            $table->double('ppn')->nullable();
            $table->string('lampiran')->nullable();

            $table->enum('cara_bayar', ['lunas','hutang']);
            $table->enum('tipe_bayar', ['cash','transfer']);
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->unsignedBigInteger('pengajuan_pembelian_id');
            $table->foreign('pengajuan_pembelian_id')->references('id')->on('pengajuan_pembelian');
            $table->string('no_rekening');
            $table->string('catatan_laporan_pembelian');
            $table->date('batas_pembayaran');
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
        Schema::dropIfExists('laporan_pembelian');
    }
}
