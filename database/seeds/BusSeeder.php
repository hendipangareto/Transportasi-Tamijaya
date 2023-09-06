<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Bus;
use App\Models\MasterData\BusPhoto;

class BusSeeder extends Seeder
{
    public function run()
    {
        Bus::create([
            'bus_code' => 'BUS-001',
            'bus_type' => 'REGULER',
            'bus_name' => 'EXECUTIVE',
            'bus_price' => '300000',
            'bus_capacity' => '22',
            'bus_image' => 'assets/bus/executive.png',
            'bus_description' => 'Reguler Executive Class 22 Seat',
            'bus_facility' => 'Bus AC, Audio Video, Karaoke, Reclining Seat, Bagasi Luas'
        ]);
        BusPhoto::create([
            'id_bus' => 1,
            'bus_photo' => 'assets/bus/executive-01.png'
        ]);
        BusPhoto::create([
            'id_bus' => 1,
            'bus_photo' => 'assets/bus/executive-02.png'
        ]);
        BusPhoto::create([
            'id_bus' => 1,
            'bus_photo' => 'assets/bus/executive-03.png'
        ]);

        Bus::create([
            'bus_code' => 'BUS-002',
            'bus_type' => 'REGULER',
            'bus_name' => 'SUITESS',
            'bus_price' => '550000',
            'bus_capacity' => '21',
            'bus_image' => 'assets/bus/suitess.png',
            'bus_description' => 'Bus dengan interior model capsule, 21 seat terbatas',
            'bus_facility' => 'Bus AC, Audio Video, Karaoke, Reclining Seat, Bagasi Luas'
        ]);
        BusPhoto::create([
            'id_bus' => 2,
            'bus_photo' => 'assets/bus/suitess-01.png'
        ]);
        BusPhoto::create([
            'id_bus' => 2,
            'bus_photo' => 'assets/bus/suitess-02.png'
        ]);
        BusPhoto::create([
            'id_bus' => 2,
            'bus_photo' => 'assets/bus/suitess-03.png'
        ]);
        BusPhoto::create([
            'id_bus' => 2,
            'bus_photo' => 'assets/bus/suitess-04.png'
        ]);
        Bus::create([
            'bus_code' => 'BUS-003',
            'bus_type' => 'PARIWISATA',
            'bus_name' => 'MIKRO BUS',
            'bus_price' => '1000000',
            'bus_capacity' => '25 - 30',
            'bus_image' => 'assets/bus/mikrobus.png',
            'bus_description' => 'Bus ini nyaman untuk 25 seat. Maksimal 30 seat',
            'bus_facility' => 'Bus AC, Audio Video, Karaoke, Reclining Seat, Bagasi Luas'
        ]);
        BusPhoto::create([
            'id_bus' => 3,
            'bus_photo' => 'assets/bus/mikro-01.png'
        ]);
        BusPhoto::create([
            'id_bus' => 3,
            'bus_photo' => 'assets/bus/mikro-02.png'
        ]);
        Bus::create([
            'bus_code' => 'BUS-004',
            'bus_type' => 'PARIWISATA',
            'bus_name' => 'MEDIUM BUS',
            'bus_price' => '1500000',
            'bus_capacity' => '35 - 40',
            'bus_image' => 'assets/bus/medium-bus.png',
            'bus_description' => 'Bus ini nyaman untuk 35 seat. Maksimal 40 seat',
            'bus_facility' => 'Bus AC, Audio Video, Karaoke, Reclining Seat, Bagasi Luas, Bantal Selimut untuk Overland'
        ]);
        BusPhoto::create([
            'id_bus' => 4,
            'bus_photo' => 'assets/bus/medium-01.png'
        ]);
        BusPhoto::create([
            'id_bus' => 4,
            'bus_photo' => 'assets/bus/medium-02.png'
        ]);
        BusPhoto::create([
            'id_bus' => 4,
            'bus_photo' => 'assets/bus/medium-03.png'
        ]);
        BusPhoto::create([
            'id_bus' => 4,
            'bus_photo' => 'assets/bus/medium-04.png'
        ]);
        Bus::create([
            'bus_code' => 'BUS-005',
            'bus_type' => 'PARIWISATA',
            'bus_name' => 'BIG BUS',
            'bus_price' => '2000000',
            'bus_capacity' => '45 - 50',
            'bus_image' => 'assets/bus/bigbus.png',
            'bus_description' => 'Bus ini nyaman untuk 45 seat. Maksimal 50 seat',
            'bus_facility' => 'Bus AC, Audio Video, Karaoke, Reclining Seat, Bagasi Luas, Bantal Selimut untuk Overland'
        ]);
    }
}
