<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Premi;

class PremiSeeder extends Seeder
{
    public function run()
    {
        Premi::create([
            'premi_code' => 'PRM-001',
            'premi_amount' => 149250,
            'premi_name' => 'PREMI SOPIR WISATA'
        ]);
        Premi::create([
            'premi_code' => 'PRM-002',
            'premi_amount' => 74625,
            'premi_name' => 'PREMI KERNET WISATA'
        ]);
        Premi::create([
            'premi_code' => 'PRM-003',
            'premi_amount' => 300000,
            'premi_name' => 'PREMI SOPIR 1 SUITESS'
        ]);
        Premi::create([
            'premi_code' => 'PRM-004',
            'premi_amount' => 300000,
            'premi_name' => 'PREMI SOPIR 2 SUITESS'
        ]);
        Premi::create([
            'premi_code' => 'PRM-005',
            'premi_amount' => 200000,
            'premi_name' => 'PREMI KERNET SUITESS'
        ]);
        Premi::create([
            'premi_code' => 'PRM-006',
            'premi_amount' => 200000,
            'premi_name' => 'PREMI SOPIR 1 EXECUTIVE'
        ]);
        Premi::create([
            'premi_code' => 'PRM-007',
            'premi_amount' => 200000,
            'premi_name' => 'PREMI SOPIR 2 EXECUTIVE'
        ]);
        Premi::create([
            'premi_code' => 'PRM-008',
            'premi_amount' => 125000,
            'premi_name' => 'PREMI KERNET EXECUTIVE'
        ]);
    }
}
