<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['facility_code', 'facility_name', 'facility_description'];
}
