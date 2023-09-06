<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class SchedulePariwisata extends Model
{
    protected $fillable = [
        'id_booking_transaction',
        'date_departure',
        'date_return',
        'id_armada',
        'bus_type',
        'total_days',
        'bus_price',
        'notes',
        'driver',
        'conductor'
    ];
}
