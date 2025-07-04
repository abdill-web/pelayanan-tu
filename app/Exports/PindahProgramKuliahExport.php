<?php

namespace App\Exports;

use App\Models\PindahProgramKuliah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PindahProgramKUliahExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PindahProgramKuliah::select('nama', 'nim', 'email', 'program_asal', 'program_tujuan', 'alasan', 'created_at')->get();
    }
    public function headings(): array
    {
        return ['Nama', 'NIM', 'Email', 'Program Studi Asal', 'Program Studi Tujuan', 'Alasan', 'Tanggal Request'];
    }
}
