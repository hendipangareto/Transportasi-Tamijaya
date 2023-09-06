<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();            
            $table->string('schedule_code')->unique();           
            $table->string('schedule_bus');       
            $table->string('schedule_day');       
            $table->string('schedule_destination');               
            $table->string('schedule_description')->nullable();       
            $table->softDeletes(); 
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
