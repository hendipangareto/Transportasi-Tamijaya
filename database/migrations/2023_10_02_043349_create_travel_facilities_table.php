<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('travel_facility_code')->unique();
            $table->string('travel_facility_name');
//            $table->string('travel_facility_icon')->nullable();
            $table->string('travel_facility_description')->nullable();
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
        Schema::dropIfExists('travel_facilities');
    }
}
