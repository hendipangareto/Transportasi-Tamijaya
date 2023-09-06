<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class BookingPayment extends Model
{
    protected $fillable = [
        'id_booking_transaction',
        'amount',
        'status',
        'payment_type',
        'attachment',
        'send_by',
        'approved_by'
    ];
}