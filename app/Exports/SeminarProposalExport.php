<?php

namespace App\Exports;

use App\Models\SeminarProposal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SeminarProposalExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return SeminarProposal::select('nama', 'nim', 'judul', 'email', 'created_at')->get();
    }
    public function headings(): array
    {
        return ['Nama', 'NIM', 'judul', 'email', 'Tanggal Request'];
    }
}