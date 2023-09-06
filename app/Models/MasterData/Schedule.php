<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['schedule_code', 'schedule_bus', 'schedule_day', 'schedule_destination'];
}
