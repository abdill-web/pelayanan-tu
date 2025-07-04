<?php

namespace App\Exports;

use App\Models\KerjaPraktik;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KerjaPraktikExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return KerjaPraktik::select('email', 'nama', 'nim', 'tujuan_surat', 'nama_perusahaan', 'alamat_perusahaan', 'program_studi', 'lama_magang', 'created_at')->get();

    }
    public function headings(): array
    {
        return ['Email', 'Nama', 'NIM', 'Tujuan Surat', 'Nama Perusahaan', 'Alamat Perusahaan', 'Program Studi', 'Lama Magang', 'Tanggal Request'];
    }
}
