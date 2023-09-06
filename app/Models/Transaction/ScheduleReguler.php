<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class ScheduleReguler extends Model
{
    protected $fillable = ['date_departure', 'id_armada', 'driver_1', 'driver_2', 'conductor', 'type_bus'];
}