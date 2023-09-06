<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\DayOff;

class DayOffSeeder extends Seeder
{
    public function run()
    {
        DayOff::create([
            'day_off_code' => 'DOF-001',
            'day_off_name' => 'Libur Januari',
            'day_off_date' => '2022-01-01'
        ]);
        DayOff::create([
            'day_off_code' => 'DOF-002',
            'day_off_name' => 'Libur Februari',
            'day_off_date' => '2022-02-28'
        ]);
    }
}
