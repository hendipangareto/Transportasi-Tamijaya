<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class GajiEmployee extends Model
{
    protected $table = 'gaji_employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'departemen_id',
        'position_id',
        'employee_status',
        'g_pokok',
        't_masa_kerja',
        't_transport',
        't_kapasitas',
        't_akademik',
        't_struktur',
        'bpjs_kesehatan',
        'bpjs_ketenagakerjaan',
        'tanggal',
        'keterangan'
    ];
}
