<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class RequestKasbon extends Model
{
    protected $table = 'kasbons';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'departemen_id',
        'position_id',
        'employee_status',
        'kode_employee',
        'tanggal',
        'nominal',
        'keterangan_kasbon',
    ];
}
