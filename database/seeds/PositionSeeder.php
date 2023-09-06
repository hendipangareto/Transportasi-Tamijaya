<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Position;

class PositionSeeder extends Seeder
{
    public function run()
    {
        Position::create([
            'position_code' => 'PST-001',
            'id_department' => 1,
            'position_name' => 'Direktur Utama'
        ]);
        Position::create([
            'position_code' => 'PST-002',
            'id_department' => 1,
            'position_name' => 'Direktur'
        ]);
        Position::create([
            'position_code' => 'PST-003',
            'id_department' => 2,
            'position_name' => 'Pengurus Bus Malam'
        ]);
        Position::create([
            'position_code' => 'PST-004',
            'id_department' => 2,
            'position_name' => 'Pemasaran Bus Pariwisata'
        ]);
        Position::create([
            'position_code' => 'PST-005',
            'id_department' => 2,
            'position_name' => 'Administrasi & Keuangan'
        ]);
        Position::create([
            'position_code' => 'PST-006',
            'id_department' => 2,
            'position_name' => 'Reservasi Tiket & IT'
        ]);
        Position::create([
            'position_code' => 'PST-007',
            'id_department' => 3,
            'position_name' => 'Kepala Bengkel'
        ]);
        Position::create([
            'position_code' => 'PST-008',
            'id_department' => 3,
            'position_name' => 'Staf Montir'
        ]);
        Position::create([
            'position_code' => 'PST-009',
            'id_department' => 3,
            'position_name' => 'Pengurus Garasi'
        ]);
        Position::create([
            'position_code' => 'PST-010',
            'id_department' => 4,
            'position_name' => 'Pengurus'
        ]);
        Position::create([
            'position_code' => 'PST-011',
            'id_department' => 4,
            'position_name' => 'Manajer Area Denpasar'
        ]);
        Position::create([
            'position_code' => 'PST-012',
            'id_department' => 4,
            'position_name' => 'Pengurus Garasi Denpasar'
        ]);
        Position::create([
            'position_code' => 'PST-013',
            'id_department' => 4,
            'position_name' => 'Perwakilan Terminal Mengwi'
        ]);
        Position::create([
            'position_code' => 'PST-014',
            'id_department' => 4,
            'position_name' => 'Perwakilan Pelabuhan Ketapang'
        ]);
        Position::create([
            'position_code' => 'PST-015',
            'id_department' => 4,
            'position_name' => 'Perwakilan Pelabuhan Gilimanuk'
        ]);
        Position::create([
            'position_code' => 'PST-016',
            'id_department' => 5,
            'position_name' => 'Pengemudi'
        ]);
        Position::create([
            'position_code' => 'PST-017',
            'id_department' => 6,
            'position_name' => 'Kondektur Bus Malam'
        ]);
        Position::create([
            'position_code' => 'PST-018',
            'id_department' => 6,
            'position_name' => 'Kondektur Wisata'
        ]);
    }
}
