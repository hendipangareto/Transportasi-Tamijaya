<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteWisatasTable extends Migration
{
    public function up()
    {
        Schema::create('route_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('route_wisata_type')->nullable();
            $table->integer('route_wisata_from');
            $table->integer('route_wisata_target');
            // $table->integer('route_wisata_price');
            $table->double('route_wisata_estimate');
            $table->text('route_wisata_description')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('route_wisatas');
    }
}
