<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuciArmadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuci_armadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('check_fisik_layanan_id');
            $table->foreign('check_fisik_layanan_id')->references('id')->on('check_fisik_layanan');

            $table->unique('check_fisik_layanan_id');
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
        Schema::dropIfExists('cuci_armadas');
    }
}
