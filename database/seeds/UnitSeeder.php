<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Unit;

class UnitSeeder extends Seeder
{
    public function run()
    {
        Unit::create([
            'unit_code' => 'UOM-001',
            'unit_name' => 'Full Booked',
            'unit_alias' => 'full',
        ]);
        Unit::create([
            'unit_code' => 'UOM-002',
            'unit_name' => 'Hari',
            'unit_alias' => 'days',
        ]);
        Unit::create([
            'unit_code' => 'UOM-003',
            'unit_name' => 'Bulan',
            'unit_alias' => 'month',
        ]);
        Unit::create([
            'unit_code' => 'UOM-004',
            'unit_name' => 'Tahun',
            'unit_alias' => 'year',
        ]);
        Unit::create([
            'unit_code' => 'UOM-005',
            'unit_name' => 'Kilometer',
            'unit_alias' => 'km',
        ]);
        Unit::create([
            'unit_code' => 'UOM-007',
            'unit_name' => 'Seat',
            'unit_alias' => 'seat',
        ]);
    }
}
