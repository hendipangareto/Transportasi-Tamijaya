<?php

use Illuminate\Database\Seeder;
use App\Models\Armada\ArmadaSchedule;

class ArmadaScheduleSeeder extends Seeder
{
    public function run()
    {
        ArmadaSchedule::create([
            'id_armada' => 1,
            'date_from' => '2022-02-8',
            'date_end' => '2022-02-10',
            'status' => 'BOOKED',
        ]);
        ArmadaSchedule::create([
            'id_armada' => 1,
            'date_from' => '2022-02-12',
            'date_end' => '2022-02-15',
            'status' => 'WISATA',
        ]);
        ArmadaSchedule::create([
            'id_armada' => 1,
            'date_from' => '2022-02-22',
            'date_end' => '2022-02-23',
            'status' => 'REPAIR',
        ]);
        ArmadaSchedule::create([
            'id_armada' => 2,
            'date_from' => '2022-02-08',
            'date_end' => '2022-02-15',
            'status' => 'WISATA',
        ]);
        ArmadaSchedule::create([
            'id_armada' => 2,
            'date_from' => '2022-02-16',
            'date_end' => '2022-02-16',
            'status' => 'REPAIR',
        ]);
        ArmadaSchedule::create([
            'id_armada' => 2,
            'date_from' => '2022-02-22',
            'date_end' => '2022-02-23',
            'status' => 'BOOKED',
        ]);
    }
}
