<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus';
    protected $fillable = ['bus_code', 'bus_name', 'bus_price', 'bus_type', 'bus_capacity','bus_image','bus_description', 'bus_description', 'bus_facility'];
}
