<?php

namespace App\Exports;

use App\Models\PengunduranDiri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengunduranDiriExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PengunduranDiri::select('nama', 'nim', 'email', 'program_studi', 'alasan', 'created_at')->get();
    }
    public function headings(): array
    {
        return ['Nama', 'NIM', 'Email', 'Program Studi', 'Alasan', 'Tanggal Request'];
    }
}
