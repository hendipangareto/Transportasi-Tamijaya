<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBengkelLuarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bengkel_luars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bengkel_luar', 255)->nullable();
            $table->string('nama_bengkel_luar', 255)->nullable();
            $table->string('hp_bengkel_luar', 255)->nullable();
            $table->string('tlp_bengkel_luar', 255)->nullable();
            $table->string('pic_bengkel_luar', 255)->nullable();
            $table->string('alamat_bengkel_luar', 255)->nullable();
            $table->unsignedBigInteger('id_city')->nullable();
            $table->foreign('id_city')->references('id')->on('cities');
            $table->unsignedBigInteger('id_province')->nullable();
            $table->foreign('id_province')->references('id')->on('provinces');

            $table->text('deskripsi_bengkel_luar')->nullable();
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
        Schema::dropIfExists('bengkel_luars');
    }
}
