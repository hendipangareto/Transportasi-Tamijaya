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
            $table->unsignedBigInteger('id_armada');
            $table->foreign('id_armada')->references('id')->on('armadas');

            $table->unsignedBigInteger('bagian_id');
            $table->foreign('bagian_id')->references('id')->on('bagians');

            $table->unsignedBigInteger('id_pick_point')->nullable();
            $table->foreign('id_pick_point')->references('id')->on('pick_points');


            $table->unsignedBigInteger('id_route_wisata')->nullable();
            $table->foreign('id_route_wisata')->references('id')->on('route_wisatas');
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
