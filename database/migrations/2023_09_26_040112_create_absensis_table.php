<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->string('id_fingerprint');
            $table->date('tanggal')->nullable();
            $table->time('scan_satu')->nullable();
            $table->time('scan_dua')->nullable();
            $table->time('scan_tiga')->nullable();
            $table->time('scan_empat')->nullable();
            $table->enum('status_absensi',['I', 'S','A','C'])->nullable();
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
        Schema::dropIfExists('absensis');
    }
}
