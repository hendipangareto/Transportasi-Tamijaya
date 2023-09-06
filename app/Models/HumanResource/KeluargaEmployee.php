<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class KeluargaEmployee extends Model
{
    protected $table = 'keluarga_employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'nama_keluarga',
        'jenis_kelamin',
        'tanggal_lahir',
        'status_keluarga',
        'alamat_ktp',
        'alamat_domisili',
        'nik',
        'npwp',
        'bpjs_kesehatan',
        'telepon',
        'email',
        'kontak_darurat'
    ];
}
