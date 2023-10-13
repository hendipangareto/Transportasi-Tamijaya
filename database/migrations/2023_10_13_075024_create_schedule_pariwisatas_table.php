<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulePariwisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_pariwisatas', function (Blueprint $table) {
            $table->id();
            $table->date('date_departure');
            $table->date('date_return');
            $table->string('kode_keberangkatan');
            $table->string('kode_tujuan');

            $table->unsignedBigInteger('id_armada')->nullable();
            $table->foreign('id_armada')->references('id')->on('armadas');

            $table->unsignedBigInteger('id_pick_point')->nullable();
            $table->foreign('id_pick_point')->references('id')->on('pick_points');

            $table->unsignedBigInteger('id_destination_wisata')->nullable();
            $table->foreign('id_destination_wisata')->references('id')->on('destination_wisatas');

            $table->unsignedBigInteger('id_employee')->nullable();
            $table->foreign('id_employee')->references('id')->on('employees');

            $table->unsignedSmallInteger('total_days')->nullable();
            $table->unsignedInteger('bus_price')->nullable();
            $table->string('sopir_1')->nullable();
            $table->string('sopir_2')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('schedule_pariwisatas');
    }
}
