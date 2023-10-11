<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string('kode_voucher')->unique();
            $table->string('nilai_voucher');
            $table->date('tanggal_buat_voucher');
            $table->string('pic_pembuat');
            $table->string('Jumlah_voucher_dibuat');
            $table->date('tanggal_keluar_voucher')->nullable();
            $table->string('pic_pengeluar_voucher')->nullable();
            $table->string('jumlah_voucher_keluar')->nullable();
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
        Schema::dropIfExists('voucher');
    }
}
