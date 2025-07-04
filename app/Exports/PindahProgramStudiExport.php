<?php

namespace App\Exports;

use App\Models\PindahProgramStudi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PindahProgramStudiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PindahProgramStudi::select('nama', 'nim', 'email', 'program_studi_asal', 'program_studi_tujuan', 'alasan', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'NIM', 'Email', 'Program Studi Asal', 'Program Studi Tujuan', 'Alasan', 'Tanggal Request'];
    }
}
