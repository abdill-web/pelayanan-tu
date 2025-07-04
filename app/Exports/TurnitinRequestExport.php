<?php

namespace App\Exports;

use App\Models\TurnitinRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TurnitinRequestExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return TurnitinRequest::select('nama', 'nim', 'email','program_studi', 'judul','file_pdf','created_at')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'NIM', 'Email', 'Program Studi', 'Judul', 'File PDF', 'Tanggal Request'];
    }
}
