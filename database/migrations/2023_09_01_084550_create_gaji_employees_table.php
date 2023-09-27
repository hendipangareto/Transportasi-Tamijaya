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
            $table->decimal('g_pokok', 10, 3)->nullable();
            $table->decimal('t_masa_kerja', 10, 3)->nullable();
            $table->decimal('t_transport', 10, 3)->nullable();
            $table->decimal('t_kapasitas', 10, 3)->nullable();
            $table->decimal('t_akademik', 10, 3)->nullable();
            $table->decimal('t_struktur', 10, 3)->nullable();
            $table->decimal('bpjs_kesehatan', 10, 3)->nullable();
            $table->decimal('bpjs_ketenagakerjaan', 10, 3)->nullable();
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
