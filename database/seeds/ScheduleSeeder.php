<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Schedule;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        Schedule::create([
            'schedule_code' => 'JWD-001',
            'schedule_bus' => 'SUITESS',
            'schedule_day' => 'Mon',
            'schedule_destination' => 'JOG-DPS',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-002',
            'schedule_bus' => 'SUITESS',
            'schedule_day' => 'Tue',
            'schedule_destination' => 'DPS-JOG',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-003',
            'schedule_bus' => 'SUITESS',
            'schedule_day' => 'Wed',
            'schedule_destination' => 'JOG-DPS',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-004',
            'schedule_bus' => 'SUITESS',
            'schedule_day' => 'Thu',
            'schedule_destination' => 'DPS-JOG',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-005',
            'schedule_bus' => 'SUITESS',
            'schedule_day' => 'Sat',
            'schedule_destination' => 'JOG-DPS',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-006',
            'schedule_bus' => 'SUITESS',
            'schedule_day' => 'Sun',
            'schedule_destination' => 'DPS-JOG',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-007',
            'schedule_bus' => 'EXECUTIVE',
            'schedule_day' => 'Tue',
            'schedule_destination' => 'JOG-DPS',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-008',
            'schedule_bus' => 'EXECUTIVE',
            'schedule_day' => 'Wed',
            'schedule_destination' => 'DPS-JOG',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-009',
            'schedule_bus' => 'EXECUTIVE',
            'schedule_day' => 'Thu',
            'schedule_destination' => 'JOG-DPS',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-010',
            'schedule_bus' => 'EXECUTIVE',
            'schedule_day' => 'Fri',
            'schedule_destination' => 'JOG-DPS',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-011',
            'schedule_bus' => 'EXECUTIVE',
            'schedule_day' => 'Fri',
            'schedule_destination' => 'DPS-JOG',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-012',
            'schedule_bus' => 'EXECUTIVE',
            'schedule_day' => 'Sat',
            'schedule_destination' => 'DPS-JOG',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-013',
            'schedule_bus' => 'EXECUTIVE',
            'schedule_day' => 'Sun',
            'schedule_destination' => 'JOG-DPS',
        ]);
        Schedule::create([
            'schedule_code' => 'JWD-014',
            'schedule_bus' => 'EXECUTIVE',
            'schedule_day' => 'Mon',
            'schedule_destination' => 'DPS-JOG',
        ]);
    }
}
