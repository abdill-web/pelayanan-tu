<?php

namespace App\Exports;

use App\Models\KoreksiKHS;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KoreksiKHSExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return KoreksiKHS::select('nama', 'nim', 'program_studi', 'semester', 'keterangan', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'NIM', 'Program Studi', 'Semester', 'Keterangan', 'Tanggal Request'];
    }
}
