<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->id();
            $table->string('kode_toko', 255)->nullable();
            $table->string('nama_toko', 255)->nullable();
            $table->string('hp_toko', 255)->nullable();
            $table->string('tlp_toko', 255)->nullable();
            $table->string('pic_toko', 255)->nullable();
            $table->string('alamat_toko', 255)->nullable();
            $table->unsignedBigInteger('id_city')->nullable();
            $table->foreign('id_city')->references('id')->on('cities');
            $table->unsignedBigInteger('id_province')->nullable();
            $table->foreign('id_province')->references('id')->on('provinces');
            $table->string('deskripsi_toko', 255)->nullable();
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
        Schema::dropIfExists('tokos');
    }
}
