<?php

namespace App\Models\PerawatanPemeliharaan\PetugasCuci;

use Illuminate\Database\Eloquent\Model;

class CuciArmada extends Model
{
    protected $table = 'cuci_armadas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'check_fisik_layanan_id',
    ];

}

