<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\BalancePasiva;

class BalancePasivaSeeder extends Seeder
{
    public function run()
    {
        BalancePasiva::create([
            'balance_pasiva_code' => 'NP-001',
            'balance_pasiva_name' => 'HUTANG LANCAR',
        ]);
        BalancePasiva::create([
            'balance_pasiva_code' => 'NP-002',
            'balance_pasiva_name' => 'HUTANG TIDAK LANCAR',
        ]);
        BalancePasiva::create([
            'balance_pasiva_code' => 'NP-003',
            'balance_pasiva_name' => 'MODAL',
        ]);
    }
}
