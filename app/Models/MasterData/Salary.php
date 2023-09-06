<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{    
    protected $table = 'salaries';
    protected $fillable = ['salary_code', 'salary_name', 'salary_amount', 'salary_description'];
}
