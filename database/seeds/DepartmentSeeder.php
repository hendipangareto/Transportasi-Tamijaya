<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::create([
            'department_code' => 'DPT-001',
            'department_name' => 'Pimpinan'
        ]);
        Department::create([
            'department_code' => 'DPT-002',
            'department_name' => 'Staf Jogja'
        ]);
        Department::create([
            'department_code' => 'DPT-003',
            'department_name' => 'Montir Garasi Jogja'
        ]);
        Department::create([
            'department_code' => 'DPT-004',
            'department_name' => 'Staf Denpasar'
        ]);
        Department::create([
            'department_code' => 'DPT-005',
            'department_name' => 'Mitra Driver'
        ]);
        Department::create([
            'department_code' => 'DPT-006',
            'department_name' => 'Mitra Kondektur'
        ]);
    }
}
