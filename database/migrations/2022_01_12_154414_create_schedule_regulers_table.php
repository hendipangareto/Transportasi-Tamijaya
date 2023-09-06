<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleRegulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_regulers', function (Blueprint $table) {
            $table->id();    
            $table->date('date_departure');           
            $table->integer('id_armada')->nullable();       
            $table->integer('driver_1')->nullable();       
            $table->integer('driver_2')->nullable();       
            $table->integer('conductor')->nullable();       
            $table->string('destination');       
            $table->string('type_bus');        
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
        Schema::dropIfExists('schedule_regulers');
    }
}
