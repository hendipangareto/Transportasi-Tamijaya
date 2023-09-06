<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Bank;

class BankSeeder extends Seeder
{
    public function run()
    {
        Bank::create([
            'bank_code' => 'BNK-001',
            'bank_name' => 'Mandiri',
            'bank_account' => '1370056706704',
            'bank_holder' => 'PT. ANUGERAH KARYA UTAMI GEMILANG'
        ]);
        Bank::create([
            'bank_code' => 'BNK-002',
            'bank_name' => 'BCA',
            'bank_account' => '0375670670',
            'bank_holder' => 'ANUGERAH KARYA UTAMI GEMILANG'
        ]);
        Bank::create([
            'bank_code' => 'BNK-003',
            'bank_name' => 'BRI',
            'bank_account' => '-',
            'bank_holder' => '-'
        ]);
    }
}
