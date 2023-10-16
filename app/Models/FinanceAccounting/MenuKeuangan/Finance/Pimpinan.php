<?php

namespace App\Models\FinanceAccounting\MenuKeuangan\Finance;

use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    protected $table = 'pimpinan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pengajuan_pembelian_id',


    ];

    public static function rules($merge = []) {
        return array_merge(
            [
                'pengajuan_pembelian_id' => 'required|unique:pimpinan',
            ],
            $merge
        );
    }

    public static function messages($merge = []) {
        return array_merge(
            [
                'pengajuan_pembelian_id.required' => 'Kolom pengajuan pembelian ID dibutuhkan.',
                'pengajuan_pembelian_id.unique' => 'Kolom pengajuan pembelian ID harus unik.',
            ],
            $merge
        );
    }
}
