<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class DayOff extends Model
{
    protected $fillable = ['day_off_code', 'day_off_name', 'day_off_date', 'day_off_description'];

}
