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
use App\Models\KoreksiKHS;
use App\Mail\FormSubmitted;
use App\Models\LegalisirRequest;
use App\Models\TurnitinRequest;
use App\Models\HasilPlagiarism;
use App\Models\PindahProgramKuliah;
use App\Models\PindahProgramStudi;
use App\Models\PengunduranDiri;
use Illuminate\Support\Facades\Storage;
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

    public function submitKoreksiKHS(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'program_studi' => 'required|string',
            'semester' => 'required|string',
            'keterangan' => 'required|string',
        ]);
    
        KoreksiKHS::create($data);
    
        return back()->with('success', 'Form Koreksi KHS berhasil dikirim.');
    }

    public function legalisirForm()
    {
        return view('forms.tu_online.legalisir');
    }

    public function submitLegalisir(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'email' => 'required|email',
            'program_studi' => 'required|string',
            'file_ijazah' => 'required|mimes:pdf|max:2048'
        ]);

        $path = $request->file('file_ijazah')->store('legalisir', 'public');
        $data['file_ijazah'] = $path;
    
        LegalisirRequest::create($data);
    
        // Email kirim konfirmasi
        Mail::to($data['email'])->send(new \App\Mail\FormSubmitted($data, 'Pengajuan Legalisir'));
    
        return back()->with('success', 'Form berhasil dikirim.');
    }

    public function cekTurnitinForm()
    {
        return view('forms.tu_online.cek_turnitin');
    }

    public function submitCekTurnitin(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'program_studi' => 'required',
            'judul' => 'required',
            'file_pdf' => 'required|mimes:pdf|max:2048',
        ]);
    
        $filePath = $request->file('file_pdf')->store('turnitin');
    
        TurnitinRequest::create([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'email' => $validated['email'],
            'program_studi' => $validated['program_studi'],
            'judul' => $validated['judul'],
            'file_pdf' => $filePath,
        ]);
    
        // (Opsional) Kirim email konfirmasi
        Mail::raw('Pengajuan Cek Turnitin Anda berhasil dikirim.', function ($message) use ($validated) {
            $message->to($validated['email'])
                    ->subject('Konfirmasi Pengajuan Turnitin');
        });
    
        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim.');
    }

    public function showPermintaanTurnitin()
    {
        return view('forms.tu_online.hasil_plagiarism');
    }
    public function submitHasilPlagiarismForm(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'email' => 'required|email',
            'judul' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);
    
        HasilPlagiarism::create($validated);
    
        return redirect()->back()->with('success', 'Data berhasil dikirim.');
    }
    

    public function pindahProgramKuliahForm()
    {
        return view('forms.tu_online.pindah_program_kuliah');
    }

    public function submitPindahProgramKuliah(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'email' => 'required|email',
            'program_studi' => 'required|string',
            'program_asal' => 'required|in:Reguler 1,Reguler 2',
            'program_tujuan' => 'required|in:Reguler 1,Reguler 2',
            'alasan' => 'required|string',
        ]);
    
        PindahProgramKuliah::create($validated);
    
        return redirect()->back()->with('success', 'Permohonan pindah program kuliah berhasil dikirim.');
    }

    public function pindahProgramStudiForm()
    {
        return view('forms.tu_online.pindah_program_studi');
    }

    public function submitPindahProgramStudi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'program_studi_asal' => 'required',
            'program_studi_tujuan' => 'required',
            'alasan' => 'required',
        ]);
    
        PindahProgramStudi::create($request->all());
    
        return back()->with('success', 'Pengajuan berhasil dikirim.');
    }

    public function pengunduranDiriForm()
    {
        return view('forms.tu_online.pengunduran_diri');
    }

    public function submitPengunduranDiri(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'program_studi' => 'required',
            'alasan' => 'required',
        ]);
    
        PengunduranDiri::create($request->all());
    
        return back()->with('success', 'Pengajuan pengunduran diri berhasil dikirim.');
    }

    public function downloadLegalisir($id)
    {
    $data = LegalisirRequest::findOrFail($id);
    $filePath = $data->file_ijazah;

    if (Storage::exists($filePath)) {
        return Storage::download($filePath);
    }

    return redirect()->back()->with('error', 'File ijazah tidak ditemukan.');
    }

    public function downloadTurnitin($id)
    {
    $data = TurnitinRequest::findOrFail($id);
    $filePath = $data->file_pdf;

    if (Storage::exists($filePath)) {
        return Storage::download($filePath);
    }

    return redirect()->back()->with('error', 'File turnitin tidak ditemukan.');
    }

}
