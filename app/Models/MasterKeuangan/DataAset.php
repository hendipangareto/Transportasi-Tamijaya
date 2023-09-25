<?php

namespace App\Models\MasterKeuangan;

use Illuminate\Database\Eloquent\Model;

class DataAset extends Model
{
    protected $table = 'data_asets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_aset',
        'nama_aset',
        'id_kategori_aset',
        'merk_aset',
        'spesifikasi_aset',
        'catatan_aset',
        'tanggal_beli_aset',
        'tanggal_pakai_aset',
        'lokasi_awal_aset',
        'pajak_aset',
        'id_kategori_pajak',
        'aset_tidak_berwujud',
        'id_metode_penyusutan',
        'akun_aset',
        'akun_akumulasi_penyusutan_aset',
        'akun_beban_penyusutan_aset',
//        'lampiran_aset',
        'kuantitas',
        'id_satuan',
        'umur_aset',
        'rasio',
        'nilai_sisa',
    ];
}
