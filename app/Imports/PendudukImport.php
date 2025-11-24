<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendudukImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Penduduk([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'pekerjaan' => $row['pekerjaan'] ?? null,
            'status' => $row['status'] ?? 'Belum Menikah',
        ]);
    }
}
