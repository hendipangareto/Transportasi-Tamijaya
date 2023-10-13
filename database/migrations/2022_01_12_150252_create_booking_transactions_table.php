<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateBookingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('booking_transactions', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('booking_transactions_code')->unique();
//            $table->string('booking_transactions_customer_code');
//            // TRAVEL
//            $table->enum('booking_transactions_type_booking', ['REGULER', 'PARIWISATA']);
//            $table->integer('booking_transactions_schedule_id')->nullable();
//            $table->integer('booking_transactions_pick_point')->nullable();
//            $table->integer('booking_transactions_arrival_point')->nullable();
//            $table->integer('booking_transactions_province_from')->nullable();
//            $table->integer('booking_transactions_city_from')->nullable();
//            $table->integer('booking_transactions_province_to')->nullable();
//            $table->integer('booking_transactions_city_to')->nullable();
//            $table->string('booking_transactions_total_seats')->nullable();
//            // PAYMENT
//            $table->string('booking_transactions_type_down_payment')->nullable();
//            $table->string('booking_transactions_payment_method');
//            $table->integer('booking_transactions_total_costs');
//            $table->integer('booking_transactions_total_discount')->nullable();
//            $table->integer('booking_transactions_additional_price')->nullable();
//            $table->integer('booking_transactions_total_down_payment')->nullable();
//            $table->integer('booking_transactions_outstanding_payment')->nullable();
//            $table->integer('booking_transactions_id_payment')->nullable();
//            $table->string('booking_transactions_payment_attachment')->nullable();
//            // AGENT
//            $table->enum('booking_transactions_is_agent', ['Y', 'N'])->nullable();
//            $table->integer('booking_transactions_id_agent')->nullable();
//            $table->integer('booking_transactions_status')->default(7);
//            $table->dateTime('booking_transactions_reschedule_date', $precision = 0)->nullable();
//            $table->string('booking_transactions_pic')->nullable();
//            $table->string('created_by')->nullable();
//            $table->string('finance_by')->nullable();
//            $table->string('updated_by')->nullable();
//            $table->softDeletes();
//            $table->timestamps();
//        });

        Schema::create('booking_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('booking_transactions_code')->unique();
            $table->string('booking_transactions_customer_code');
            $table->enum('booking_transactions_type_booking', ['REGULER', 'PARIWISATA']);
            $table->unsignedInteger('booking_transactions_schedule_id')->nullable();
            $table->unsignedInteger('booking_transactions_pick_point')->nullable();
            $table->unsignedInteger('booking_transactions_arrival_point')->nullable();
            $table->unsignedInteger('booking_transactions_province_from')->nullable();
            $table->unsignedInteger('booking_transactions_city_from')->nullable();
            $table->unsignedInteger('booking_transactions_province_to')->nullable();
            $table->unsignedInteger('booking_transactions_city_to')->nullable();
            $table->unsignedSmallInteger('booking_transactions_total_seats')->nullable();
            $table->string('booking_transactions_type_down_payment')->nullable();
            $table->string('booking_transactions_payment_method');
            $table->unsignedInteger('booking_transactions_total_costs');
            $table->unsignedInteger('booking_transactions_total_discount')->nullable();
            $table->unsignedInteger('booking_transactions_additional_price')->nullable();
            $table->unsignedInteger('booking_transactions_total_down_payment')->nullable();
            $table->unsignedInteger('booking_transactions_outstanding_payment')->nullable();
            $table->unsignedInteger('booking_transactions_id_payment')->nullable();
            $table->string('booking_transactions_payment_attachment')->nullable();
            $table->enum('booking_transactions_is_agent', ['Y', 'N'])->nullable();
            $table->unsignedInteger('booking_transactions_id_agent')->nullable();
            $table->unsignedSmallInteger('booking_transactions_status')->default(7);
            $table->dateTime('booking_transactions_reschedule_date')->nullable();
            $table->string('booking_transactions_pic')->nullable();
            $table->string('created_by')->nullable();
            $table->string('finance_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('booking_transactions');
    }
}
