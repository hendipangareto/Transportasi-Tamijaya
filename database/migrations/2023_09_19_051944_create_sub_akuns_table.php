<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_akuns', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sub_akun');
            $table->string('nama_sub_akun');
            $table->unsignedBigInteger('id_akun')->nullable();
            $table->foreign('id_akun')->references('id')->on('akuns');
            $table->string('deskripsi_sub_akun');
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
        Schema::dropIfExists('sub_akuns');
    }
}
