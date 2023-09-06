<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable =[
        'id',
        'state_name',
        'state_code',
      ];
}
