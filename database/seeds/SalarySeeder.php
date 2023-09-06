<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Salary;

class SalarySeeder extends Seeder
{
    public function run()
    {
        Salary::create([
            'salary_code' => 'SLR-001',
            'salary_amount' => 0,
            'salary_name' => 'PREMI SOPIR WISATA'
        ]);
        Salary::create([
            'salary_code' => 'SLR-002',
            'salary_amount' => 0,
            'salary_name' => 'PREMI KERNET WISATA'
        ]);
        Salary::create([
            'salary_code' => 'SLR-003',
            'salary_amount' => 300000,
            'salary_name' => 'PREMI SOPIR 1 SUITESS'
        ]);
        Salary::create([
            'salary_code' => 'SLR-004',
            'salary_amount' => 300000,
            'salary_name' => 'PREMI SOPIR 2 SUITESS'
        ]);
        Salary::create([
            'salary_code' => 'SLR-005',
            'salary_amount' => 200000,
            'salary_name' => 'PREMI KERNET SUITESS'
        ]);
        Salary::create([
            'salary_code' => 'SLR-006',
            'salary_amount' => 200000,
            'salary_name' => 'PREMI SOPIR 1 EXECUTIVE'
        ]);
        Salary::create([
            'salary_code' => 'SLR-007',
            'salary_amount' => 200000,
            'salary_name' => 'PREMI SOPIR 2 EXECUTIVE'
        ]);
        Salary::create([
            'salary_code' => 'SLR-008',
            'salary_amount' => 125000,
            'salary_name' => 'PREMI KERNET EXECUTIVE'
        ]);
    }
}
