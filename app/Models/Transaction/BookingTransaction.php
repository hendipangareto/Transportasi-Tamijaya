<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'booking_transactions_code',
        'booking_transactions_customer_code',
        'booking_transactions_type_booking',
        'booking_transactions_schedule_id',
        'booking_transactions_pick_point',
        'booking_transactions_arrival_point',
        'booking_transactions_province_from',
        'booking_transactions_city_from',
        'booking_transactions_province_to',
        'booking_transactions_city_to',
        'booking_transactions_total_seats',
        'booking_transactions_total_costs',
        'booking_transactions_outstanding_payment',
        'booking_transactions_total_discount',
        'booking_transactions_payment_method',
        'booking_transactions_type_down_payment',
        'booking_transactions_total_down_payment',
        'booking_transactions_id_payment',
        'booking_transactions_payment_attachment',
        'booking_transactions_is_agent',
        'booking_transactions_id_agent',
        'booking_transactions_additional_price',
        'booking_transactions_status',
        'booking_transactions_pic',
        'booking_transactions_status',
        'created_by',
        'finance_by',
        'updated_by',
    ];
}
