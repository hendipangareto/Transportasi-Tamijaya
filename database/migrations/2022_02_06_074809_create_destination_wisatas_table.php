<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('destination_wisata_code')->unique();
            $table->integer('destination_wisata_province');
            $table->string('destination_wisata_name');
            $table->string('destination_wisata_description')->nullable();
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
        Schema::dropIfExists('destination_wisatas');
    }
}
