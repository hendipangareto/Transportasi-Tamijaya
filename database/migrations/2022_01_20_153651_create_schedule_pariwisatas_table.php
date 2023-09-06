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
            $table->integer('id_booking_transaction');
            $table->date('date_departure');
            $table->date('date_return');
            $table->string('bus_type')->nullable();
            $table->integer('id_armada')->nullable();
            $table->integer('total_days')->nullable();
            $table->integer('bus_price')->nullable();
            $table->integer('driver')->nullable();
            $table->integer('conductor')->nullable();
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
