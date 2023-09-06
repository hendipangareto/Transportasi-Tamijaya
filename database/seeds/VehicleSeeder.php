<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vehicles')->insert([
            'service' => 'Wisata',
            'class' => 'MIKRO BUS',
            'merk' => 'Hino',
            'seat' => '20 - 29 SEAT',
            'police_number' => 'AB 7408 AS',
            'created_at' => Carbon::now()
        ]);
    }
}
