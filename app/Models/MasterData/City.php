<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'id_state',        
        'city_name',
        'type'
      ];

    public function provinces()
    {
        return $this->belongsTo(Province::class,'id_state','id');
    }
}
