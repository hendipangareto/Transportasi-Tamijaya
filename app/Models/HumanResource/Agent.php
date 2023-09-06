<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['agent_code', 'agent_name', 'agent_domicile', 'agent_description'];
}
