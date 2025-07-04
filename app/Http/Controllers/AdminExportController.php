<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RequestKelasExport;
use App\Exports\PindahProgramStudiExport;
use App\Exports\PindahProgramKuliahExport;
use App\Exports\PengunduranDiriExport;
use App\Exports\LegalisirRequestExport;
use App\Exports\SeminarProposalExport;
use App\Exports\SidangTugasAkhirExport;
use App\Exports\KerjaPraktikExport;
use App\Exports\SurveyExport;
use App\Exports\YudisiumExport;
use App\Exports\KoreksiNilaiExport;
use App\Exports\KoreksiKhsExport;
use App\Exports\HasilPlagiarismExport;
use App\Exports\TurnitinRequestExport;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class AdminExportController extends Controller
{
        public function exportRequestKelas()
    {
        return Excel::download(new RequestKelasExport, 'request_kelas.xlsx');
    }

        public function exportPindahProgramStudi()
    {
        return Excel::download(new PindahProgramStudiExport, 'pindah_program_studi.xlsx');
    }
        public function exportPindahProgramKuliah()
    {
        return Excel::download(new PindahProgramKuliahExport, 'pindah_program_kuliah.xlsx');
    }
        public function exportPengunduranDiri()
    {
        return Excel::download(new PengunduranDiriExport, 'pengunduran_diri.xlsx');
    }
        public function exportLegalisirRequest()
    {
        return Excel::download(new LegalisirRequestExport, 'legalisir_request.xlsx');
    }
        public function exportSeminarProposal()
    {
        return Excel::download(new SeminarProposalExport, 'seminar_proposal.xlsx');
    }
        public function exportSidangTugasAkhir()
    {
        return Excel::download(new SidangTugasAkhirExport, 'sidang_tugas_akhir.xlsx');
    }
        public function exportKerjaPraktik()
    {
        return Excel::download(new KerjaPraktikExport, 'kerja_praktik.xlsx');
    }
        public function exportSurvey()
    {
        return Excel::download(new SurveyExport, 'survey.xlsx');
    }
        public function exportYudisium()
    {
        return Excel::download(new YudisiumExport, 'yudisium.xlsx');
    }
        public function exportKoreksiNilai()
    {
        return Excel::download(new KoreksiNilaiExport, 'koreksi_nilai.xlsx');
    }
        public function exportKoreksiKHS()
    {
        return Excel::download(new KoreksiKHSExport, 'koreksi_khs.xlsx');
    }
        public function exportTurnitinRequest()
    {
        return Excel::download(new TurnitinRequestExport, 'turnitin_request.xlsx');
    }
        public function exportHasilPlagiarism()
    {
        return Excel::download(new HasilPlagiarismExport, 'hasil_plagiarism.xlsx');
    }

    public function getTurnitinFile($filename)
{
    $path = storage_path('app/private/turnitin/' . $filename);

    if (file_exists($path)) {
        return response()->file($path, [
            'Content-Type' => File::mimeType($path),
            'Content-Disposition' => 'inline; filename="'.$filename.'"',
        ]);
    }

    return redirect()->back()->with('error', 'File tidak ditemukan.');
}
}