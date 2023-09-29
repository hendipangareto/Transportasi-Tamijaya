<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class RequestGaji extends Model
{
    protected $table = 'request_gaji_employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'gaji_employee_id',
        'tanggal',
        'nominal',
        'cek_pegajuan',
        'status_bayar',
        'cara_bayar',

    ];
}
