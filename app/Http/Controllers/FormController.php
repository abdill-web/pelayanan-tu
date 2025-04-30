<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeminarProposal;
use App\Models\SidangTugasAkhir;
use App\Models\KerjaPraktik;
use App\Models\Survey;
use App\Models\Yudisium;
use App\Models\RequestKelas;
use App\Models\KoreksiNilai;
use App\Mail\FormSubmitted;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function seminarProposalForm()
    {
        return view('forms.seminar_proposal');
    }

    public function submitSeminarProposal(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'judul' => 'required|string',
            'email' => 'required|email',
        ]);

        SeminarProposal::create($data);
        Mail::to($data['email'])->send(new FormSubmitted($data, 'Seminar Proposal'));

        return back()->with('success', 'Form berhasil dikirim dan email konfirmasi telah dikirim.');
    }

    public function sidangTAForm()
    {
        return view('forms.s1.sidang_tugas_akhir');
    }

    public function submitSidangTA(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'judul' => 'required',
            'email' => 'required|email'
        ]);

        SidangTugasAkhir::create($data);
        Mail::to($data['email'])->send(new FormSubmitted($data, 'Sidang Tugas Akhir'));

        return back()->with('success', 'Form berhasil dikirim.');
    }

    public function kerjaPraktikForm()
    {
        return view('forms.pengantar.kerja_praktik');
    }

    public function submitKerjaPraktik(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'nama' => 'required',
            'nim' => 'required',
            'tujuan_surat' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'program_studi' => 'required',
            'lama_magang' => 'required'
        ]);

        KerjaPraktik::create($data);
        Mail::to($data['email'])->send(new FormSubmitted($data, 'Surat Pengantar - Kerja Praktik'));

        return back()->with('success', 'Form berhasil dikirim.');
    }

    public function surveyForm()
    {
        return view('forms.pengantar.survey');
    }
    
    public function submitSurvey(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string',
            'nim' => 'required|string',
            'program_studi' => 'required|string',
            'asal_kampus' => 'required|string',
            'no_telp' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'alamat_perusahaan' => 'required|string',
            'ditujukan_kepada' => 'required|string',
            'gender' => 'required|string',
            'jabatan' => 'required|string',
            'data_diminta' => 'required|string',
            'pernyataan' => 'required|string',
        ]);
    
        Survey::create($validated);
    
        Mail::to($validated['email'])->send(new FormSubmitted($validated, 'Survey/Penelitian Data Tugas Akhir'));
    
        return redirect()->back()->with('success', 'Form berhasil dikirim!');
    }

    public function yudisiumForm()
    {
        return view('forms.s1.yudisium');
    }
    
    public function submitYudisium(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'email' => 'required|email',
            'program_studi' => 'required|string',
            'angkatan' => 'required|string',
            'ipk' => 'required|numeric',
            'judul_ta' => 'required|string'
        ]);
    
        Yudisium::create($data);
        Mail::to($data['email'])->send(new FormSubmitted($data, 'Yudisium'));
    
        return back()->with('success', 'Form berhasil dikirim.');
    }

    // ============================
    // Pelayanan TU Online
    // ============================

    public function requestKelasForm()
    {
        return view('forms.tu_online.request_kelas');
    }

    public function submitRequestKelas(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'program_studi' => 'required|string',
            'mata_kuliah' => 'required|string',
            'alasan' => 'required|string',
        ]);
    
        RequestKelas::create($data);

        return back()->with('success', 'Form Request Kelas berhasil dikirim.');
    }   

    public function koreksiNilaiForm()
    {
        return view('forms.tu_online.koreksi_nilai');
    }

    public function submitKoreksiNilai(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'program_studi' => 'required|string',
            'mata_kuliah' => 'required|string',
            'dosen_pengampu' => 'required|string',
            'semester' => 'required|string',
            'alasan_koreksi' => 'required|string',
        ]);
    
        KoreksiNilai::create($data);

        return back()->with('success', 'Form Koreksi Nilai berhasil dikirim.');
    }

    public function koreksiKhsForm()
    {
        return view('forms.tu_online.koreksi_khs');
    }

    public function submitKoreksiKhs(Request $request)
    {
        return back()->with('success', 'Form Koreksi KHS berhasil dikirim.');
    }

    public function legalisirForm()
    {
        return view('forms.tu_online.legalisir');
    }

    public function submitLegalisir(Request $request)
    {
        return back()->with('success', 'Form Pengajuan Legalisir berhasil dikirim.');
    }

    public function cekTurnitinForm()
    {
        return view('forms.tu_online.cek_turnitin');
    }

    public function submitCekTurnitin(Request $request)
    {
        return back()->with('success', 'Form Pengajuan Cek Turnitin berhasil dikirim.');
    }

    public function hasilPlagiarismForm()
    {
        return view('forms.tu_online.hasil_plagiarism');
    }

    public function submitHasilPlagiarism(Request $request)
    {
        return back()->with('success', 'Form Permintaan Hasil Cek Plagiarism berhasil dikirim.');
    }

    public function pindahProgramKuliahForm()
    {
        return view('forms.tu_online.pindah_program_kuliah');
    }

    public function submitPindahProgramKuliah(Request $request)
    {
        return back()->with('success', 'Form Pindah Program Kuliah berhasil dikirim.');
    }

    public function pindahProgramStudiForm()
    {
        return view('forms.tu_online.pindah_program_studi');
    }

    public function submitPindahProgramStudi(Request $request)
    {
        return back()->with('success', 'Form Pindah Program Studi berhasil dikirim.');
    }

    public function pengunduranDiriForm()
    {
        return view('forms.tu_online.pengunduran_diri');
    }

    public function submitPengunduranDiri(Request $request)
    {
        return back()->with('success', 'Form Pengajuan Pengunduran Diri berhasil dikirim.');
    }
}
