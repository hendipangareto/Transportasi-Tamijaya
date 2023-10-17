<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapPengajuanDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_pengajuan_dana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengajuan_pembelian_id');
            $table->foreign('pengajuan_pembelian_id')->references('id')->on('pengajuan_pembelian');
            // Menambahkan indeks unik
            $table->unique('pengajuan_pembelian_id');
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
        Schema::dropIfExists('rekap_pengajuan_dana');
    }
}
