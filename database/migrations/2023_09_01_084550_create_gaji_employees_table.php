<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji_employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('departemen_id');
            $table->integer('position_id');
            $table->string('employee_status');
            $table->double('g_pokok')->nullable();
            $table->double('t_masa_kerja')->nullable();
            $table->double('t_transport')->nullable();
            $table->double('t_kapasitas')->nullable();
            $table->double('t_akademik')->nullable();
            $table->double('t_struktur')->nullable();
            $table->double('bpjs_kesehatan')->nullable();
            $table->double('bpjs_ketenagakerjaan')->nullable();
            $table->date('tanggal');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('gaji_employees');
    }
}
