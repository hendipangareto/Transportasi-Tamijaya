<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['bank_code', 'bank_name', 'bank_account', 'bank_holder', 'bank_description'];
}
