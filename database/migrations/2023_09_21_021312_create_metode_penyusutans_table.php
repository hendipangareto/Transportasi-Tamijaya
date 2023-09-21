<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodePenyusutansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metode_penyusutans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_metode_penyusutan');
            $table->string('nama_metode_penyusutan');
            $table->text('keterangan_metode_penyusutan')->nullable();
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
        Schema::dropIfExists('metode_penyusutans');
    }
}
