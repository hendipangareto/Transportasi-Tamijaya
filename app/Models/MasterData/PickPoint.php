<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class PickPoint extends Model
{
    protected $fillable = ['pick_point_code', 'pick_point_origin', 'pick_point_name', 'pick_point_eta', 'pick_point_zone', 'pick_point_description'];
}
