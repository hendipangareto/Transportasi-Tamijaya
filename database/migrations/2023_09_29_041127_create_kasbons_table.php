<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasbonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasbons', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('departemen_id');
            $table->integer('position_id');
            $table->string('employee_status');
            $table->string('kode_employee');
            $table->date('tanggal');
            $table->double('nominal');
            $table->string('keterangan_kasbon');
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
        Schema::dropIfExists('kasbons');
    }
}
