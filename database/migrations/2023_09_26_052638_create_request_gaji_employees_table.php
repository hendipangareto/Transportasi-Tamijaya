<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestGajiEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_gaji_employees', function (Blueprint $table) {
            $table->id();
            $table->integer('gaji_employee_id');
            $table->date('tanggal');
            $table->double('nominal');
            $table->enum('cek_pegajuan',['0','1']);
            $table->string('status_bayar');
            $table->enum('cara_bayar',['cash','transfer']);
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
        Schema::dropIfExists('request_gaji_employees');
    }
}
