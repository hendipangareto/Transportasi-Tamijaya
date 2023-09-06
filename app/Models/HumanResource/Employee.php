<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['employee_code', 'employee_name', 'id_position', 'id_department'];
}
