<?php

use Illuminate\Database\Seeder;
use App\Models\HumanResource\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::create([
            'employee_id' => '2023-EMP-01',
            'id_fingerprint' => '002',
            'employee_name' => 'Adita Rian P
',
            'id_department' => 1,
            'position_id' => 1,
            'employee_status' => 'Tetap',
            'awal_kontrak' => '2018-03-24',
            'selesai_kontrak' => '2023-03-2',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '1999-03-02',
            'status_perkawinan' => 'Belum Kawin',
            'alamat' => 'Yogyakarta',
            'alamat_domisili' => 'Yogyakarta',
            'nik' => '352562654758568568',
            'npwp' => '54654654654654',
            'bpjs_kesehatan' => '65654645654636',
            'bpjs_ketenagakerjaan' => '5464565',
            'telepon' => '08546346346',
            'email' => 'mamiek@gmail.com',
            'rekening_name' => 'Mamiek',
            'no_rekening' => '565466',
            'kontak_darurat' => '085657567567567'

        ]);
        // End Kondektur
    }
}
