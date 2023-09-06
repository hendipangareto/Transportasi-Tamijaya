<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingItineraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_itinerary', function (Blueprint $table) {
            $table->id();
            $table->string('booking_transaction_id');
            $table->string('booking_itinerary_tujuan');
            $table->string('booking_itinerary_destinasi');
            $table->string('booking_itinerary_notes')->nullable();
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
        Schema::dropIfExists('booking_itinerary');
    }
}
