<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->id();
            $table->string('bus_code')->unique();
            $table->string('bus_type');
            $table->string('bus_name');
            $table->string('bus_price')->nullable();
            $table->string('bus_capacity')->nullable();
            $table->string('bus_image')->nullable();
            $table->string('bus_description')->nullable();
            $table->text('bus_facility')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('bus');
    }
}
