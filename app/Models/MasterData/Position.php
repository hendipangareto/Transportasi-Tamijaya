<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{    
    protected $fillable = ['position_code', 'position_name', 'position_description', 'id_department'];
}
