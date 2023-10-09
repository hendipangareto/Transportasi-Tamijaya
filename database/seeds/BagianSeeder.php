<?php

use Illuminate\Database\Seeder;
use App\Models\MasterDataLogistik\Bagian;

class BagianSeeder extends Seeder
{
    public function run()
    {
         Bagian::create([
            'kode_bagian' => 'BGN-001', // Perhatikan bahwa spasi ekstra dihapus di sini
            'nama_bagian' => 'Voluptate error nisi',
            'deskripsi_bagian' => 'Quis beatae impedit',
        ]);
    }
}


