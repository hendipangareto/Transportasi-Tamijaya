<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class BookingItinerary extends Model
{
    protected $table = 'booking_itinerary';
    protected $fillable = [
        'booking_transaction_id',
        'booking_itinerary_tujuan',
        'booking_itinerary_destinasi',
        'booking_itinerary_harga'
    ];
}
