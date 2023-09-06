<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['unit_code', 'unit_name', 'unit_alias', 'unit_description'];
}
