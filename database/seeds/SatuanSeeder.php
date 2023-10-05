<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Satuan;

class SatuanSeeder extends Seeder
{

    public function run()
    {
        Satuan::create([
            'kode_satuan' => 'STN-001',
            'nama_satuan' => 'pcs',
            'deskripsi_satuan' => 'jumlah perpcs',
        ]);
    }
}
