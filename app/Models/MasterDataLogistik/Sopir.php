<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    protected $table = 'check_fisik_layanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'keluhan',
        'id_armada',
        'bagian_id',
    ];

}
