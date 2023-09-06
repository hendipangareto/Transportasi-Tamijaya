<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['service_code', 'service_name', 'service_description'];
}
