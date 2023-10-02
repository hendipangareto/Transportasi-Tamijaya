<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class TravelFacility extends Model
{
    protected $table = 'travel_facilities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'travel_facility_code',
        'travel_facility_name',
        'travel_facility_description',

    ];
}

