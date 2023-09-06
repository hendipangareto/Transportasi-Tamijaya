<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_seats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booking_seats_code')->nullable();
            $table->integer('booking_seats_schedule_id')->nullable();
            $table->integer('booking_seats_booking_id')->nullable();
            $table->string('booking_seats_seat_number')->nullable();
            $table->integer('booking_seats_seat_price')->nullable();
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
        Schema::dropIfExists('booking_seats');
    }
}
