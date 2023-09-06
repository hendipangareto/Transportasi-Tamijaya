<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['office_code', 'office_name', 'office_phone', 'office_origin', 'office_address'];
}
