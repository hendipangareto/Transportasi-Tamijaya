<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class SchedulePariwisata extends Model
{
    protected $table = 'schedule_pariwisatas';
    protected $primaryKey = 'id';
    protected $fillable = [
//        'id_booking_transaction',
        'date_departure',
        'date_return',
        'id_armada',
        'id_pick_point',
        'id_employee',
        'id_destination_wisata',
//        'bus_type',
        'total_days',
        'bus_price',
        'sopir_1',
        'sopir_2',
//        'kernet',
        'notes',
//        'driver',
//        'conductor'
    ];
}
