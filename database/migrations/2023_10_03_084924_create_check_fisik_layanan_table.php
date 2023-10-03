<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckFisikLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_fisik_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('keluhan');
            $table->integer('id_armada');
            $table->unsignedBigInteger('bagian_id');
            $table->foreign('bagian_id')->references('id')->on('bagians');;

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
        Schema::dropIfExists('check_fisik_layanan');
    }
}
