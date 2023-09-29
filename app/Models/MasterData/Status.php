<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $table = 'status';
    protected $primaryKey = 'id';
    protected $fillable = [
        'status_code',
        'status_name',
        'status_description',

    ];

}
