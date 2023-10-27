<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class QsActual extends Model
{
    protected $table = 'qs_actuals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_pengajuan',
        'item',
        'harga',
        'kuantitas',
        'cara_bayar',
        'toko_id',
        'kategori_id',
        'satuan_id',
        'catatan_pembelian',
        'batas_waktu_pembayaran',
        'tanggal_pengajuan',

//        ========================
        'bank_id',
        'status_pengiriman',
        'bukti_pengiriman'

    ];
//    public function tambahItems()
//    {
//        return $this->hasMany(TambahItem::class);
//    }
}

