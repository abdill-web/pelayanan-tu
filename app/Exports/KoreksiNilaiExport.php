<?php

namespace App\Exports;

use App\Models\KoreksiNilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KoreksiNilaiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return KoreksiNilai::select('nama', 'nim', 'mata_kuliah', 'alasan_koreksi', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'NIM', 'Mata Kuliah', 'Alasan', 'Tanggal Request'];
    }
}