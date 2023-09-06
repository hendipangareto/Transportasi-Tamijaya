<?php

use Illuminate\Database\Seeder;
use App\Models\MasterData\Office;

class OfficeSeeder extends Seeder
{
    public function run()
    {
        Office::create([
            'office_code' => 'OFC-001',
            'office_origin' => 'YOGYAKARTA',
            'office_name' => 'Kantor Pusat',
            'office_address' => 'Jl. R. E. Martadinata No.84, Pakuncen, Wirobrajan, Kota Yogyakarta, Daerah Istimewa Yogyakarta',
            'office_phone' => '(0274) 618922,Kantor Pusat | (0274) 618967,Kantor Cabang | (0274) 618080,Kantor Cabang | (0274) 586742,Kantor Cabang | +62 811-250-136,Ike | +62 811-250-147, Joko | +62 822-268-80162,Dwi | +62 813-2834-3429,Antok | +62 856-4311-9510,Putra | +62 857-2760-7560,Riri'
        ]);
        Office::create([
            'office_code' => 'OFC-002',
            'office_origin' => 'BALI',
            'office_name' => 'Kantor Cabang',
            'office_address' => 'Jl. Bulu Indah - Gg. Pondok Indah, Denpasar, Bali',
            'office_phone' => ' (0361) 9076845,Kantor Pusat | +62 813-3865-2996,Wayan | +62 878-6212-1955,Putu | +62 851-0095-7592,Ayu | +62 812-3674-6978,Koman'
        ]);
    }
}
