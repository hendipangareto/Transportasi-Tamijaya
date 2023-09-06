<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\PickPoint;

class PickPointSeeder extends Seeder
{
    public function run()
    {
        PickPoint::create([
            'pick_point_code' => 'PCK-001',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'GARASI Jl. Tinosidin',
            'pick_point_eta' => '11:00:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-002',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'KANTOR PUSAT Wirobrajan',
            'pick_point_eta' => '11:00:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-003',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'SPBU BUGISAN',
            'pick_point_eta' => '11:10:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-004',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'DONGKELAN (Ringroad)',
            'pick_point_eta' => '11:15:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-005',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'TERMINAL GIWANGAN',
            'pick_point_eta' => '11:20:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-006',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'NGIPIK',
            'pick_point_eta' => '11:40:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-007',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'KETANDAN',
            'pick_point_eta' => '12:00:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-008',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'MIROTA JANTI (Oleh-oleh)',
            'pick_point_eta' => '12:00:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-009',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'PASAR SAMBILEGI (Maguwo)',
            'pick_point_eta' => '12:10:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-010',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'BAKPIA 25 BANDARA JAYA',
            'pick_point_eta' => '12:10:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-011',
            'pick_point_origin' => 'JOGJA',
            'pick_point_alias' => 'YK',
            'pick_point_name' => 'PRAMBANAN',
            'pick_point_eta' => '12:15:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-012',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'TERM Baru Klaten',
            'pick_point_eta' => '12:50:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-013',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'TERM Lama Klaten/AGEN K.WUNI',
            'pick_point_eta' => '13:00:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-014',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'TERMINAL PENGGUNG',
            'pick_point_eta' => '13:10:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-015',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'DELANGGU',
            'pick_point_eta' => '13:20:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-016',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'KOPASSUS G2',
            'pick_point_eta' => '13:30:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-017',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'TUGU KARTOSURO',
            'pick_point_eta' => '13:45:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-018',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'TERM. TIRTONADI (AGEN BOGO)',
            'pick_point_eta' => '14:00:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-019',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'PALUR PLAZA',
            'pick_point_eta' => '14:25:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-020',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'GENDINGAN/MASARAN',
            'pick_point_eta' => '14:40:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-021',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'PUNGKRUK (Arah Tol)',
            'pick_point_eta' => '15:15:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-022',
            'pick_point_origin' => 'KLATEN-SOLO-NGAWI',
            'pick_point_alias' => 'KSN',
            'pick_point_name' => 'RM DUTA NGAWI',
            'pick_point_eta' => '15:30:00',
            'pick_point_zone' => 'WIB'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-023',
            'pick_point_origin' => 'DENPASAR',
            'pick_point_alias' => 'BL',
            'pick_point_name' => 'GARASI Jl. Buluh Indah',
            'pick_point_eta' => '12:00:00',
            'pick_point_zone' => 'WITA'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-024',
            'pick_point_origin' => 'DENPASAR',
            'pick_point_alias' => 'BL',
            'pick_point_name' => 'TERMINAL MENGHWI',
            'pick_point_eta' => '13:00:00',
            'pick_point_zone' => 'WITA'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-025',
            'pick_point_origin' => 'DENPASAR',
            'pick_point_alias' => 'BL',
            'pick_point_name' => 'TABANAN',
            'pick_point_eta' => '13:30:00',
            'pick_point_zone' => 'WITA'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-026',
            'pick_point_origin' => 'DENPASAR',
            'pick_point_alias' => 'BL',
            'pick_point_name' => 'TERMINAL PERSIAPAN',
            'pick_point_eta' => '13:40:00',
            'pick_point_zone' => 'WITA'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-027',
            'pick_point_origin' => 'DENPASAR',
            'pick_point_alias' => 'BL',
            'pick_point_name' => 'NEGARA',
            'pick_point_eta' => '15:30:00',
            'pick_point_zone' => 'WITA'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-028',
            'pick_point_origin' => 'DENPASAR',
            'pick_point_alias' => 'BL',
            'pick_point_name' => 'GILIMANUK',
            'pick_point_eta' => '16:00:00',
            'pick_point_zone' => 'WITA'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-029',
            'pick_point_origin' => 'DENPASAR',
            'pick_point_alias' => 'BL',
            'pick_point_name' => 'KETAPANG-BANYUWANGI',
            'pick_point_eta' => '16:10:00',
            'pick_point_zone' => 'WITA'
        ]);
        PickPoint::create([
            'pick_point_code' => 'PCK-030',
            'pick_point_origin' => 'DENPASAR',
            'pick_point_alias' => 'BL',
            'pick_point_name' => 'RM BALIDUA-SITUBONDO',
            'pick_point_eta' => '18:45:00',
            'pick_point_zone' => 'WITA'
        ]);
    }
}
