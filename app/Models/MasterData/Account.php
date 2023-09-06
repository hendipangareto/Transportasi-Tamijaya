<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['account_code', 'account_name', 'account_type', 'id_type'];
}
