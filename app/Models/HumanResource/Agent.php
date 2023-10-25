<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agent';
    protected $primaryKey = 'id';
    protected $fillable = [
        'agent_code',
        'agent_name',
        'id_city',
        'id_province',
        'agent_hp',
        'agent_tlp',
        'agent_email',
        'agent_alamat',
        'agent_domicile',
        'agent_description'
    ];
}
