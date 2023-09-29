<?php

namespace App\Imports;

use App\Models\HumanResource\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsensiImport implements ToModel
{
    public function model(array $row)
    {
        return new Absensi([
            'id_fingerprint' => $row[1],
            'tanggal' => $row[6],
            'scan_satu' => $row[7],
            'scan_dua' => $row[8],
            'scan_tiga' => $row[9],
            'scan_empat' => $row[10],
            'status_absensi' => $row[11],
        ]);
    }
}
