<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_satuan',
        'nama_satuan',
        'deskripsi_satuan',

    ];
}
