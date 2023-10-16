<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePimpinanTable extends Migration
{

    public function up()
    {
        Schema::create('pimpinan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengajuan_pembelian_id');
            $table->foreign('pengajuan_pembelian_id')->references('id')->on('pengajuan_pembelian');
            // Menambahkan indeks unik
            $table->unique('pengajuan_pembelian_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pimpinan');
    }
}
