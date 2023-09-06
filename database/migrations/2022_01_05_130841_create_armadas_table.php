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
            $table->increments('id');
            $table->enum('armada_category', ['REGULER','PARIWISATA']);
            $table->enum('armada_type', ['MIKRO BUS', 'MEDIUM BUS', 'BIG BUS', 'BIGBUS VIP SUITESCLASS', 'EXECUTIVE', 'SUITESS']);
            $table->integer('armada_year')->nullable();
            $table->string('armada_capacity')->nullable();
            $table->string('armada_cylinder')->nullable();
            $table->string('armada_seat');
            $table->string('armada_merk');
            $table->string('armada_no_police');
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
