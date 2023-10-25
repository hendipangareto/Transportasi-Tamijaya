<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Satuan;

class SatuanSeeder extends Seeder
{

    public function run()
    {
        Satuan::create([
            'kode_satuan' => 'STN-0101',
            'nama_satuan' => 'Pcs',
            'deskripsi_satuan' => 'jumlah per pcs'
        ]);
    }
}
