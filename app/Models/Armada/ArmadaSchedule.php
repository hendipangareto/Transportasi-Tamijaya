<?php

namespace App\Models\Armada;

use Illuminate\Database\Eloquent\Model;

class ArmadaSchedule extends Model
{
    protected $fillable = ['id_armada', 'date_from', 'date_end', 'status'];
}
