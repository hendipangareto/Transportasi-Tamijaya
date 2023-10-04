<?php

namespace App\Models\PerawatanPemeliharaan;

use Illuminate\Database\Eloquent\Model;

class CekLayananFisik extends Model
{
    protected $table = 'check_fisik_layanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'keluhan',
        'id_armada',
        'bagian_id',
    ];

}
