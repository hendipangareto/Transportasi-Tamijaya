<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'employee_name',
        'departemen_id',
        'position_id',
        'employee_status',
        'awal_kontrak',
        'selesai_kontrak',
        'jenis_kelamin',
        'status_perkawinan',
        'alamat',
        'alamat_domisili',
        'nik',
        'npwp',
        'bpjs_kesehatan',
        'bpjs_ketenagakerjaan',
        'telepon',
        'email',
        'rekening_name',
        'no_rekening',
        'kontak_darurat',
        'id_fingerprint',

    ];
}
