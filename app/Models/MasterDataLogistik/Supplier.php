<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code_supplier',
        'nama_supplier',
        'alamat_supplier',
        'kontak_supplier'
    ];
}
