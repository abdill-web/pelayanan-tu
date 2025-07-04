<?php

namespace App\Exports;

use App\Models\LegalisirRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LegalisirRequestExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return LegalisirRequest::select('nama', 'nim', 'program_studi', 'file_ijazah', 'created_at')->get();
    }
    public function headings(): array
    {
        return ['Nama', 'NIM', 'Program Studi', 'File Ijazah', 'Tanggal Request'];
    }
}
