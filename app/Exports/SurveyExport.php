<?php

namespace App\Exports;

use App\Models\Survey;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SurveyExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Survey::select('email', 'nama', 'nim', 'program_studi', 'asal_kampus', 'no_telp', 'nama_perusahaan', 'alamat_perusahaan', 'ditujukan_kepada', 'gender', 'jabatan', 'data_diminta', 'pernyataan', 'created_at')->get();
    }
    public function headings(): array
    {
        return ['Email', 'Nama', 'NIM', 'Program Studi', 'Asal Kampus', 'No Telp', 'Nama Perusahaan', 'Alamat Perusahaan', ' Ditujukan Kepada', 'Gender', 'Jabatan', 'Data Diminta', 'Tanggal Request'];
    }
}