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
            $table->integer('id_armada');
            $table->integer('bagian_id');

            $table->string('keluhan')->nullable();
            $table->integer('status')->nullable();

            $table->timestamps();
        });
    }
//            $table->integer('id_pick_point');
//            $table->integer('id_destination_wisata');
//            $table->string('keluhan');
//            $table->string('armada_capacity');
//            $table->unsignedBigInteger('id_armada');
//            $table->foreign('id_armada')->references('id')->on('armadas');
//
//            $table->unsignedBigInteger('bagian_id');
//            $table->foreign('bagian_id')->references('id')->on('bagians');
//
//            $table->unsignedBigInteger('id_pick_point')->nullable();
//            $table->foreign('id_pick_point')->references('id')->on('pick_points');
//
//
//            $table->unsignedBigInteger('id_destination_wisata')->nullable();
//            $table->foreign('id_destination_wisata')->references('id')->on('destination_wisatas');
//            $table->integer('status')->nullable();
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
