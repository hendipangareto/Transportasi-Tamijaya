<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pick_points', function (Blueprint $table) {
            $table->id();
            $table->string('pick_point_code')->unique();
            $table->string('pick_point_origin');
            $table->string('pick_point_alias')->nullable();
            $table->string('pick_point_name');
            $table->time('pick_point_eta', $precision = 0);
            $table->string('pick_point_zone');
            $table->string('pick_point_description')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pick_points');
    }
}
