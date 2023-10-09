<?php

use Illuminate\Database\Seeder;
use App\Models\MasterDataLogistik\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Kategori::create([
            'kode_kategori' => 'BRG-001', // Perhatikan bahwa spasi ekstra dihapus di sini
            'nama_kategori' => 'Ban Mobil',
            'deskripsi_kategori' => 'Ban Mobil Minibus',
        ]);
    }
}


