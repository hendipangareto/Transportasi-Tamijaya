<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_fingerprint',
        'tanggal',
        'scan_satu',
        'scan_dua',
        'scan_tiga',
        'scan_empat',
        'status_absensi'

    ];
}
