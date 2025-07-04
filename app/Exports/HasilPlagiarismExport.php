<?php

namespace App\Exports;

use App\Models\HasilPlagiarism;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HasilPlagiarismExport implements FromCollection, WithHeadings
{
        public function collection()
    {
        return HasilPlagiarism::select('nama', 'nim', 'email', 'judul', 'catatan', 'created_at')->get();
    }
    public function headings(): array
    {
        return ['Nama', 'NIM', 'Email', 'Judul', 'Catatan', 'Tanggal Request'];
    }
}

