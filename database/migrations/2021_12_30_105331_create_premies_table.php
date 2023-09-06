<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premies', function (Blueprint $table) {
            $table->id();
            $table->string('premi_code')->unique();
            $table->string('premi_name');               
            $table->double('premi_amount');       
            $table->string('premi_description')->nullable();       
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
        Schema::dropIfExists('premies');
    }
}
