<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Role;


class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'role_code' => 'RLE-001',
            'role_name' => 'Super Admin',
            'role_level' => 1,
        ]);
        Role::create([
            'role_code' => 'RLE-002',
            'role_name' => 'Owner',
            'role_level' => 1,
        ]);
        Role::create([
            'role_code' => 'RLE-003',
            'role_name' => 'Admin',
            'role_level' => 2,
        ]);
        Role::create([
            'role_code' => 'RLE-004',
            'role_name' => 'Keuangan',
            'role_level' => 3,
        ]);
        Role::create([
            'role_code' => 'RLE-005',
            'role_name' => 'Reservation',
            'role_level' => 4,
        ]);
        Role::create([
            'role_code' => 'RLE-006',
            'role_name' => 'Repairs & Maintenance',
            'role_level' => 4,
        ]);

        Role::create([
            'role_code' => 'PRT-007',
            'role_name' => 'Perawatan & Pemeliharaan',
            'role_level' => 7,
        ]);

        Role::create([
            'role_code' => 'PTC-008',
            'role_name' => 'Perawatan & Pemeliharaan',
            'role_level' => 8,
        ]);
        Role::create([
            'role_code' => 'SPV-009',
            'role_name' => 'Perawatan & Pemeliharaan',
            'role_level' => 9,
        ]);
    }
}
