<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('agent_code')->unique();
//            $table->string('agent_domicile');
            $table->string('agent_name');
            $table->string('agent_description')->nullable();
            $table->unsignedBigInteger('id_city')->nullable();
            $table->foreign('id_city')->references('id')->on('cities');
            $table->unsignedBigInteger('id_province')->nullable();
            $table->foreign('id_province')->references('id')->on('provinces');
            $table->string('agent_hp', 255)->nullable();
            $table->string('agent_tlp', 255)->nullable();
            $table->string('agent_email', 255)->nullable();
            $table->string('agent_alamat', 255)->nullable();
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
        Schema::dropIfExists('agents');
    }
}
