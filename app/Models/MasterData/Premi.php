<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Premi extends Model
{
    protected $table = 'premies';
    protected $fillable = ['premi_code', 'premi_name', 'premi_amount', 'premi_description'];
}
