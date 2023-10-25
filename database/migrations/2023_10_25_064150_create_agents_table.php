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
        Schema::create('agent', function (Blueprint $table) {
            $table->id();
            $table->string('agent_code')->unique();
            $table->string('agent_name');
            $table->integer('id_city');
            $table->integer('id_province');
            $table->string('agent_hp')->nullable();
            $table->string('agent_tlp')->nullable();
            $table->string('agent_email')->nullable();
            $table->string('agent_alamat')->nullable();
            $table->string('agent_domicile')->nullable();
            $table->string('agent_description')->nullable();
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
        Schema::dropIfExists('agent');
    }
}
