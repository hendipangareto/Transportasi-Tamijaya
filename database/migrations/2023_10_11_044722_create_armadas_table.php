<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armadas', function (Blueprint $table) {
            $table->id();
            $table->enum('armada_category', ['REGULER','PARIWISATA']);
            $table->enum('armada_type', ['MIKRO BUS', 'MEDIUM BUS', 'BIG BUS', 'BIGBUS VIP SUITESCLASS', 'EXECUTIVE', 'SUITESS']);
            $table->integer('armada_year')->nullable();
            $table->string('armada_capacity')->nullable();
            $table->string('armada_cylinder')->nullable();
            $table->string('armada_seat');
            $table->string('armada_merk');
            $table->string('armada_no_police');
            $table->unsignedBigInteger('id_pick_point')->nullable();
            $table->foreign('id_pick_point')->references('id')->on('pick_points');
            $table->unsignedBigInteger('id_destination_wisata')->nullable();
            $table->foreign('id_destination_wisata')->references('id')->on('destination_wisatas');
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
        Schema::dropIfExists('armadas');
    }
}
