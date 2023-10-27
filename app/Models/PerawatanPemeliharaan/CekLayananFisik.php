<?php

namespace App\Models\PerawatanPemeliharaan;

use Illuminate\Database\Eloquent\Model;

class CekLayananFisik extends Model
{
    protected $table = 'check_fisik_layanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_armada',
        'bagian_id',

        'keluhan',
        'status'
    ];

}
//        'id_pick_point',
//        'id_destination_wisata',
