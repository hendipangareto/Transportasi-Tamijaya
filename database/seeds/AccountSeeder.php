<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        Account::create([
            'account_code' => '00-100-001',
            'account_name' => 'Cash Head Office',
            'account_type' => 'AKTIVA',
            'id_group_account' => 1,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-100-002',
            'account_name' => 'Cash dari Agent Reguler Suitess JOG - DPS',
            'account_type' => 'AKTIVA',
            'id_group_account' => 1,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-100-003',
            'account_name' => 'Cash dari Agent Reguler Executive JOG - DPS',
            'account_type' => 'AKTIVA',
            'id_group_account' => 1,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-100-004',
            'account_name' => 'Cash dari Agent Reguler Suitess DPS - JOG',
            'account_type' => 'AKTIVA',
            'id_group_account' => 1,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-100-005',
            'account_name' => 'Cash dari Agent Reguler Executive DPS - JOG',
            'account_type' => 'AKTIVA',
            'id_group_account' => 1,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-100-006',
            'account_name' => 'Cash dari Agent Pariwisata',
            'account_type' => 'AKTIVA',
            'id_group_account' => 1,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-110-001',
            'account_name' => 'Bank Mandiri: 1370056706704 AN. PT. ANUGERAH KARYA UTAMI GEMILANG',
            'account_type' => 'AKTIVA',
            'id_group_account' => 2,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-110-002',
            'account_name' => 'Bank BCA : 0375670670 AN. ANUGERAH KARYA UTAMI GEMILANG',
            'account_type' => 'AKTIVA',
            'id_group_account' => 2,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-110-003',
            'account_name' => 'Bank BRI: TBA',
            'account_type' => 'AKTIVA',
            'id_group_account' => 2,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-120-001',
            'account_name' => 'Penjualan Tiket Reguler Suitess Jogjakarta Denpasar',
            'account_type' => 'AKTIVA',
            'id_group_account' => 3,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-120-002',
            'account_name' => 'Penjualan Tiket Reguler Executive Jogjakarta Denpasar',
            'account_type' => 'AKTIVA',
            'id_group_account' => 3,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-120-003',
            'account_name' => 'Penjualan Tiket Reguler Suitess Denpasar Jogjakarta',
            'account_type' => 'AKTIVA',
            'id_group_account' => 3,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-120-004',
            'account_name' => 'Penjualan Tiket Reguler Executive Denpasar Jogjakarta',
            'account_type' => 'AKTIVA',
            'id_group_account' => 3,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-120-005',
            'account_name' => 'Penjualan Tiket Sewa Pariwisata',
            'account_type' => 'AKTIVA',
            'id_group_account' => 3,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-200-001',
            'account_name' => 'Pembelian Asset Kantor',
            'account_type' => 'PASIVA',
            'id_group_account' => 4,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-200-002',
            'account_name' => 'Pembelian Armada',
            'account_type' => 'PASIVA',
            'id_group_account' => 4,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-001',
            'account_name' => 'Uang Makan Wisata',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-002',
            'account_name' => 'Uang BBM Wisata',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-003',
            'account_name' => 'Uang BBM Tambahan',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-004',
            'account_name' => 'Uang Tambahan Lain - Lain Wisata',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-005',
            'account_name' => 'Rapid Test Crew',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-006',
            'account_name' => 'Biaya Makan RM Duta',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-007',
            'account_name' => 'Biaya Makan RM Bali',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-008',
            'account_name' => 'Biaya Snack SuitessPenumpang',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-009',
            'account_name' => 'Biaya BBM Suitess Jogjakarta - Denpasar',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-010',
            'account_name' => 'Biaya BBM Suitess Denpasar - Jogjakarta',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-011',
            'account_name' => 'Biaya Snack Suitess II',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-012',
            'account_name' => 'Service Makan Suitess Jogjakarta - Denpasar',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-210-013',
            'account_name' => 'Service Makan Suitess Denpasar - Jogjakarta',
            'account_type' => 'PASIVA',
            'id_group_account' => 5,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-220-001',
            'account_name' => 'Gaji Karyawan',
            'account_type' => 'PASIVA',
            'id_group_account' => 6,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-220-002',
            'account_name' => 'Gaji Kernet',
            'account_type' => 'PASIVA',
            'id_group_account' => 6,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-220-003',
            'account_name' => 'Gaji Sopir',
            'account_type' => 'PASIVA',
            'id_group_account' => 6,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-220-004',
            'account_name' => 'Premi Sopir',
            'account_type' => 'PASIVA',
            'id_group_account' => 6,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-220-005',
            'account_name' => 'Premi Kernet',
            'account_type' => 'PASIVA',
            'id_group_account' => 6,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-220-006',
            'account_name' => 'Bonus Karyawan',
            'account_type' => 'PASIVA',
            'id_group_account' => 6,
            'id_type' => 1
        ]);
        Account::create([
            'account_code' => '00-220-007',
            'account_name' => 'Bonus Crew',
            'account_type' => 'PASIVA',
            'id_group_account' => 6,
            'id_type' => 1
        ]);
    }
}
