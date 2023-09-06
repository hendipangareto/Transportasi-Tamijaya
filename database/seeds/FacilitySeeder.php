<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Facility;

class FacilitySeeder extends Seeder
{
    public function run()
    {
        Facility::create([
            'facility_code' => 'FCL-001',
            'facility_icon' => 'FCL-001',
            'facility_name' => 'Bus AC'
        ]);
        Facility::create([
            'facility_code' => 'FCL-002',
            'facility_name' => 'Audio Video'
        ]);
        Facility::create([
            'facility_code' => 'FCL-003',
            'facility_name' => 'Karaoke'
        ]);
        Facility::create([
            'facility_code' => 'FCL-004',
            'facility_name' => 'Reclining Seat'
        ]);
        Facility::create([
            'facility_code' => 'FCL-005',
            'facility_name' => 'Bagasi Luas'
        ]);
        Facility::create([
            'facility_code' => 'FCL-006',
            'facility_name' => 'Bantal Selimut untuk Overland'
        ]);
    }
}
