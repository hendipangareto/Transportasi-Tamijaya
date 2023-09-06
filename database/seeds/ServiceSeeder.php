<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'service_code' => 'SRV-001',
            'service_name' => 'SEWA BUS PARIWISATA'
        ]);
        Service::create([
            'service_code' => 'SRV-002',
            'service_name' => 'ATHLETIC EVENTS'
        ]);
        Service::create([
            'service_code' => 'SRV-003',
            'service_name' => 'PAKET WISATA JAWA - BALI'
        ]);
        Service::create([
            'service_code' => 'SRV-004',
            'service_name' => 'WISATA RELIGI / ZIARAH'
        ]);
        Service::create([
            'service_code' => 'SRV-005',
            'service_name' => 'CORPORATE EVENTS'
        ]);
        Service::create([
            'service_code' => 'SRV-006',
            'service_name' => 'CITY TOUR'
        ]);
        Service::create([
            'service_code' => 'SRV-007',
            'service_name' => 'SCHEDULED TOURS'
        ]);
        Service::create([
            'service_code' => 'SRV-008',
            'service_name' => 'AIRPORT TRANSFER SERVICES'
        ]);
        Service::create([
            'service_code' => 'SRV-009',
            'service_name' => 'JAWA - BALI OVERLAND TOUR'
        ]);
        Service::create([
            'service_code' => 'SRV-010',
            'service_name' => 'GROUP TOURS PLANNING'
        ]);
        Service::create([
            'service_code' => 'SRV-011',
            'service_name' => 'MEET & GREET VIP SERVICES'
        ]);
        Service::create([
            'service_code' => 'SRV-012',
            'service_name' => 'MICE & OUTBOUND TRANSPORT'
        ]);
        Service::create([
            'service_code' => 'SRV-013',
            'service_name' => 'SCHEDULED CONTRACT SERVICES'
        ]);
        Service::create([
            'service_code' => 'SRV-014',
            'service_name' => 'STUDY TOUR, FIELD TRIP / KKL'
        ]);
        Service::create([
            'service_code' => 'SRV-015',
            'service_name' => 'STUDI BANDING'
        ]);
        Service::create([
            'service_code' => 'SRV-016',
            'service_name' => 'INTERCITY BUS JOGJA - DENPASAR'
        ]);
    }
}
