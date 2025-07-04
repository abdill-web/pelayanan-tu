<?php

namespace App\Exports;

use App\Models\Yudisium;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class YudisiumExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Yudisium::select('nama', 'nim', 'email', 'program_studi', 'angkatan', 'ipk', 'judul_ta', 'created_at')->get();
    }
    public function headings(): array
    {
        return ['Nama', 'NIM', 'Email', 'Program Studi', 'Angkatan', 'IPK', 'Judul TA', 'Tanggal Pengajuan'];
    }
}
