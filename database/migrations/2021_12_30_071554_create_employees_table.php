<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('employee_name');
            $table->integer('id_department');
            $table->integer('position_id');
            $table->string('employee_status');
            $table->date('awal_kontrak');
            $table->date('selesai_kontrak');
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->date('tanggal_lahir');
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin','Cerai Hidup','Cerai Mati'])->default('Belum Kawin');
            $table->string('alamat')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('nik')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bpjs_kesehatan')->nullable();
            $table->string('bpjs_ketenagakerjaan')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('rekening_name')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('kontak_darurat')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
