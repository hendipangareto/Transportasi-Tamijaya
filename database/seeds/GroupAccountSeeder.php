<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\GroupAccount;

class GroupAccountSeeder extends Seeder
{
    public function run()
    {
        GroupAccount::create([
            'group_account_code' => '00-100',
            'group_account_name' => 'CASH PAYMENT',
            'group_account_type' => 'DEBIT'
        ]);

        GroupAccount::create([
            'group_account_code' => '00-110',
            'group_account_name' => 'TRANSFER PAYMENT',
            'group_account_type' => 'DEBIT'
        ]);

        GroupAccount::create([
            'group_account_code' => '00-120',
            'group_account_name' => 'REVENUE',
            'group_account_type' => 'DEBIT'
        ]);

        GroupAccount::create([
            'group_account_code' => '00-200',
            'group_account_name' => 'EXPENSE',
            'group_account_type' => 'KREDIT'
        ]);

        GroupAccount::create([
            'group_account_code' => '00-220',
            'group_account_name' => 'OPERASIONAL BUS',
            'group_account_type' => 'KREDIT'
        ]);
        GroupAccount::create([
            'group_account_code' => '00-230',
            'group_account_name' => 'GAJI',
            'group_account_type' => 'KREDIT'
        ]);
        GroupAccount::create([
            'group_account_code' => '00-240',
            'group_account_name' => 'OPERASIONAL KANTOR',
            'group_account_type' => 'KREDIT'
        ]);
    }
}
