<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriPajaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_pajaks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kategori_pajak');
            $table->string('nama_kategori_pajak');
            $table->integer('tahun_pajak');
            $table->unsignedBigInteger('id_metode_penyusutan')->nullable();
            $table->foreign('id_metode_penyusutan')->references('id')->on('metode_penyusutans');
            $table->decimal('tarif_pajak', 5, 2);
            $table->text('deskripsi_pajak')->nullable();
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
        Schema::dropIfExists('kategori_pajaks');
    }
}
