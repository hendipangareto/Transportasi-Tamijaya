<?php

use Illuminate\Database\Seeder;
use App\Models\Transaction\BookingTransaction;
use App\Models\Transaction\BookingSeat;

class TransactionRegulerSeeder extends Seeder
{
    public function run()
    {
        // BookingTransaction::create([
        //     'id' => 1,
        //     'booking_transactions_code' => 'R19082548',
        //     'booking_transactions_customer_code' => '1',
        //     'booking_transactions_type_booking' => 'REGULER',
        //     'booking_transactions_schedule_id' => 5,
        //     'booking_transactions_pick_point' => 1,
        //     'booking_transactions_arrival_point' => 23,
        //     'booking_transactions_total_seats' => 3,
        //     'booking_transactions_total_costs' => 1500000,
        //     'booking_transactions_total_discount' => 150000,
        //     'booking_transactions_payment_method' => 'TRANSFER',
        //     'booking_transactions_id_payment' => 1,
        //     'booking_transactions_payment_attachment' => 'assets/payment/p01.jpeg',
        //     'booking_transactions_is_agent' => 'Y',
        //     'booking_transactions_id_agent' => 8,
        //     'booking_transactions_status' => 19,
        //     'created_by' => '1',
        //     'updated_by' => NULL,
        //     'created_at' => '2022-01-19 08:25:48',
        //     'updated_at' => '2022-01-19 08:25:48'
        // ]);

        // BookingTransaction::create([
        //     'id' => 2,
        //     'booking_transactions_code' => 'R19082729',
        //     'booking_transactions_customer_code' => '2',
        //     'booking_transactions_type_booking' => 'REGULER',
        //     'booking_transactions_schedule_id' => 9,
        //     'booking_transactions_pick_point' => 1,
        //     'booking_transactions_arrival_point' => 23,
        //     'booking_transactions_total_seats' => 2,
        //     'booking_transactions_total_costs' => 600000,
        //     'booking_transactions_total_discount' => 0,
        //     'booking_transactions_payment_method' => 'TRANSFER',
        //     'booking_transactions_id_payment' => 3,
        //     'booking_transactions_payment_attachment' => 'assets/payment/p02.jpeg',
        //     'booking_transactions_is_agent' => 'N',
        //     'booking_transactions_id_agent' => NULL,
        //     'booking_transactions_status' => 19,
        //     'created_by' => '1',
        //     'updated_by' => NULL,
        //     'created_at' => '2022-01-19 08:27:29',
        //     'updated_at' => '2022-01-19 08:27:29'
        // ]);

        // BookingSeat::create([
        //     'id' => 1,
        //     'booking_seats_schedule_id' => 5,
        //     'booking_seats_booking_id' => 1,
        //     'booking_seats_seat_number' => '1D',
        //     'booking_seats_seat_price' => 550000,
        //     'created_at' => '2022-01-19 15:25:48',
        //     'updated_at' => NULL
        // ]);



        // BookingSeat::create([
        //     'id' => 2,
        //     'booking_seats_schedule_id' => 5,
        //     'booking_seats_booking_id' => 1,
        //     'booking_seats_seat_number' => '1B',
        //     'booking_seats_seat_price' => 550000,
        //     'created_at' => '2022-01-19 15:25:48',
        //     'updated_at' => NULL
        // ]);



        // BookingSeat::create([
        //     'id' => 3,
        //     'booking_seats_schedule_id' => 5,
        //     'booking_seats_booking_id' => 1,
        //     'booking_seats_seat_number' => '2D',
        //     'booking_seats_seat_price' => 550000,
        //     'created_at' => '2022-01-19 15:25:48',
        //     'updated_at' => NULL
        // ]);



        // BookingSeat::create([
        //     'id' => 4,
        //     'booking_seats_schedule_id' => 9,
        //     'booking_seats_booking_id' => 2,
        //     'booking_seats_seat_number' => '1C',
        //     'booking_seats_seat_price' => 300000,
        //     'created_at' => '2022-01-19 15:27:29',
        //     'updated_at' => NULL
        // ]);



        // BookingSeat::create([
        //     'id' => 5,
        //     'booking_seats_schedule_id' => 9,
        //     'booking_seats_booking_id' => 2,
        //     'booking_seats_seat_number' => '1B',
        //     'booking_seats_seat_price' => 300000,
        //     'created_at' => '2022-01-19 15:27:29',
        //     'updated_at' => NULL
        // ]);
    }
}
