<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['department_code', 'department_name', 'department_description'];
}
