<?php

namespace App\Exports;

use App\Models\RequestKelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RequestKelasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return RequestKelas::select('nama', 'nim', 'mata_kuliah', 'alasan', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'NIM', 'Mata Kuliah', 'Alasan', 'Tanggal Request'];
    }
}
