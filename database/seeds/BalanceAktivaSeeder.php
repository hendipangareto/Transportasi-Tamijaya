<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\BalanceAktiva;

class BalanceAktivaSeeder extends Seeder
{
    public function run()
    {
        BalanceAktiva::create([
            'balance_aktiva_code' => 'NR-001',
            'balance_aktiva_name' => 'AKTIVA LANCAR',
        ]);
        BalanceAktiva::create([
            'balance_aktiva_code' => 'NR-002',
            'balance_aktiva_name' => 'AKTIVA TETAP',
        ]);
    }
}
