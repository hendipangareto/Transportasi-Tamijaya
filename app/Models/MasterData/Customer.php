<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['customer_code', 'customer_name', 'id_city', 'id_province', 'customer_address', 'customer_phone', 'customer_email', 'customer_nik', 'customer_address'];

    protected $hidden = [
        'customer_nik',
        'customer_code',
        'id_city',
        'id_province'
    ];
}
