<?php

use Illuminate\Database\Seeder;
use App\Models\Transaction\BookingTransaction;
use App\Models\Transaction\BookingItinerary;
use App\Models\Transaction\SchedulePariwisata;

class TransactionPariwisataSeeder extends Seeder
{
    public function run()
    {
        BookingTransaction::create([
            'id' => 3,
            'booking_transactions_code' => 'P29062338',
            'booking_transactions_customer_code' => '1',
            'booking_transactions_type_booking' => 'PARIWISATA',
            'booking_transactions_schedule_id' => NULL,
            'booking_transactions_pick_point' => NULL,
            'booking_transactions_arrival_point' => NULL,
            'booking_transactions_province_from' => 33,
            'booking_transactions_city_from' => 3308,
            'booking_transactions_province_to' => 52,
            'booking_transactions_city_to' => 5208,
            'booking_transactions_total_seats' => '30',
            'booking_transactions_total_costs' => 590000,
            'booking_transactions_total_discount' => 20000,
            'booking_transactions_additional_price' => 50000,
            'booking_transactions_payment_method' => 'TRANSFER',
            'booking_transactions_id_payment' => 1,
            'booking_transactions_payment_attachment' => 'assets/payment/p03.jpeg',
            'booking_transactions_is_agent' => NULL,
            'booking_transactions_id_agent' => NULL,
            'booking_transactions_status' => 19,
            'booking_transactions_reschedule_date' => NULL,
            'created_by' => '1',
            'updated_by' => NULL,
            'deleted_at' => NULL,
            'created_at' => '2022-01-29 06:23:38',
            'updated_at' => '2022-01-29 06:23:38'
        ]);

        BookingItinerary::create([
            'id' => 1,
            'booking_transaction_id' => '3',
            'booking_itinerary_tujuan' => 'Jawa Tengah',
            'booking_itinerary_destinasi' => '',
            'booking_itinerary_harga' => 10000,
            'created_at' => '2022-01-29 13:23:38',
            'updated_at' => NULL
        ]);

        BookingItinerary::create([
            'id' => 2,
            'booking_transaction_id' => '3',
            'booking_itinerary_tujuan' => 'Nusa Tenggara Barat',
            'booking_itinerary_destinasi' => '',
            'booking_itinerary_harga' => 50000,
            'created_at' => '2022-01-29 13:23:38',
            'updated_at' => NULL
        ]);

        SchedulePariwisata::create([
            'id' => 1,
            'id_booking_transaction' => 3,
            'date_departure' => '2022-01-29',
            'date_return' => '2022-01-31',
            'id_armada' => 4,
            'total_days' => 2,
            'bus_price' => 500000,
            'notes' => 'Travel JWT - NTB',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
    }
}
