<?php

namespace App\Exports;

use App\Models\SidangTugasAkhir;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SidangTugasAkhirExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return SidangTugasAkhir::select('nama', 'nim', 'judul', 'email', 'created_at')->get();
    }
    public function headings(): array
    {
        return ['Nama', 'NIM', 'Judul', 'Email', 'Tanggal Request'];
    }
}
