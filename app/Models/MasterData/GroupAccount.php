<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class GroupAccount extends Model
{
    protected $fillable = ['group_account_code', 'group_account_name', 'group_account_type', 'id_type'];
}
