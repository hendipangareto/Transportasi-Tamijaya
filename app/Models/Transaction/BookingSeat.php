<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class BookingSeat extends Model
{
    protected $fillable = [
        'booking_seats_schedule_id',
        'booking_seats_booking_id',
        'booking_seats_seat_number',
        'booking_seats_seat_price'
    ];
}
