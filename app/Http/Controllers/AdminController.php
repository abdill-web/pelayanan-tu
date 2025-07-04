<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PindahProgramKuliah;
use App\Models\PindahProgramStudi;
use App\Models\PengunduranDiri;
use App\Models\LegalisirRequest;
use App\Models\SeminarProposal;
use App\Models\SidangTugasAkhir;
use App\Models\KerjaPraktik;
use App\Models\Survey;
use App\Models\Yudisium;
use App\Models\RequestKelas;
use App\Models\KoreksiNilai;
use App\Models\KoreksiKHS;
use App\Models\TurnitinRequest;
use App\Models\HasilPlagiarism;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $pindahProdi = PindahProgramStudi::latest()->get();
        $pindahKuliah = PindahProgramKuliah::latest()->get();
        $pengunduranDiri = PengunduranDiri::latest()->get();
        $legalisir = LegalisirRequest::latest()->get();
        $seminarProposal = SeminarProposal::latest()->get();
        $sidangTa = SidangTugasAkhir::latest()->get();
        $kerjaPraktik = KerjaPraktik::latest()->get();
        $survey = Survey::latest()->get();
        $yudisium = Yudisium::latest()->get();
        $requestKelas = RequestKelas::latest()->get();
        $koreksiNilai = KoreksiNilai::latest()->get();
        $koreksiKhs = KoreksiKHS::latest()->get();
        $turnitinRequest = TurnitinRequest::latest()->get();
        $hasilPlagiarism = HasilPlagiarism::latest()->get();

        if ($search) {
            $pindahProdi = $pindahProdi->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $pindahKuliah = $pindahKuliah->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $pengunduranDiri = $pengunduranDiri->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $legalisir = $legalisir->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $seminarProposal = $seminarProposal->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $sidangTa = $sidangTa->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $kerjaPraktik = $kerjaPraktik->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $survey = $survey->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $yudisium = $yudisium->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $requestKelas = $requestKelas->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $koreksiNilai = $koreksiNilai->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $koreksiKhs = $koreksiKhs->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $turnitinRequest = $turnitinRequest->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
            $hasilPlagiarism = $hasilPlagiarism->filter(fn($item) => str_contains(strtolower($item->nama), strtolower($search)) || str_contains($item->nim, $search));
        }

        return view('admin.dashboard', compact(
            'pindahProdi',
            'pindahKuliah',
            'pengunduranDiri',
            'legalisir',
            'seminarProposal',
            'sidangTa',
            'kerjaPraktik',
            'survey',
            'yudisium',
            'requestKelas',
            'koreksiNilai',
            'koreksiKhs',
            'turnitinRequest',
            'hasilPlagiarism',
            'search'
        ));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function sidangTa()
    {
        $sidangTa = SidangTugasAkhir::latest()->get();

        return view('admin.sidang-ta', compact('sidangTa'));
    }

    public function seminarProposal()
    {
        return view('admin.seminar_proposal', [
            'data' => SeminarProposal::latest()->get()
        ]);
    }

    public function kerjaPraktik()
    {
        return view('admin.kerja_praktik', [
            'data' => KerjaPraktik::latest()->get()
        ]);
    }

    public function survey()
    {
        return view('admin.survey', [
            'data' => Survey::latest()->get()
        ]);
    }

    public function yudisium()
    {
        return view('admin.yudisium', [
            'data' => Yudisium::latest()->get()
        ]);
    }

    public function requestKelas()
    {
        return view('admin.request-kelas', [
            'data' => RequestKelas::latest()->get()
        ]);
    }

    public function koreksiNilai()
    {
        return view('admin.koreksi-nilai', [
            'data' => KoreksiNilai::latest()->get()
        ]);
    }

    public function koreksiKhs()
    {
        return view('admin.koreksi-khs', [
            'data' => KoreksiKHS::latest()->get()
        ]);
    }

    public function TurnitinRequest()
    {
        return view('admin.cek-turnitin', [
            'data' => TurnitinRequest::latest()->get()
        ]);
    }

    public function pindahProdiDetail()
    {
        $data = PindahProgramStudi::latest()->get();

        return view('admin.detail.pindah-prodi', compact('data'));
    }

    public function pindahProgramKuliah()
    {
        $data = \App\Models\PindahProgramKuliah::latest()->get();

        return view('admin.pindah-program-kuliah', compact('data'));
    }

    public function pengunduranDiri()
    {
        $data = \App\Models\PengunduranDiri::latest()->get();
        return view('admin.pengunduran-diri', compact('data'));
    }

    public function legalisir()
    {
        $data = \App\Models\LegalisirRequest::latest()->get();
        return view('admin.legalisir', compact('data'));
    }

    public function hasilPlagiarism()
    {
        return view('admin.hasil-plagiarism', [
            'data' => HasilPlagiarism::latest()->get()
        ]);
    }

    public function lihatIjazah($filename)
    {
        $path = storage_path('app/public/legalisir/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public function cekTurnitin($filename)
    {
        $path = storage_path('app/private/turnitin/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->file($path);
    }

    public function updateStatusPindahProdi(Request $request, $id)
    {
        $data = \App\Models\PindahProgramStudi::findOrFail($id);
        $data->status = $request->status;
        $data->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusPindahProgramKuliah(Request $request, $id)
    {
        $data = \App\Models\PindahProgramKuliah::findOrFail($id);
        $data->status = $request->status;
        $data->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusPengunduranDiri(Request $request, $id)
    {
        $data = \App\Models\PengunduranDiri::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusLegalisir(Request $request, $id)
    {
        $data = \App\Models\LegalisirRequest::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusSeminarProposal(Request $request, $id)
    {
        $data = \App\Models\SeminarProposal::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusSidangTa(Request $request, $id)
    {
        $data = \App\Models\SidangTugasAkhir::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusKerjaPraktik(Request $request, $id)
    {
        $data = \App\Models\KerjaPraktik::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusSurvey(Request $request, $id)
    {
        $data = \App\Models\Survey::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusYudisium(Request $request, $id)
    {
        $data = \App\Models\Yudisium::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusRequestKelas(Request $request, $id)
    {
        $data = \App\Models\RequestKelas::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusKoreksiNilai(Request $request, $id)
    {
        $data = \App\Models\KoreksiNilai::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusKoreksiKHS(Request $request, $id)
    {
        $data = \App\Models\KoreksiKHS::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusTurnitinRequest(Request $request, $id)
    {
        $data = \App\Models\TurnitinRequest::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
    public function updateStatusHasilPlagiarism(Request $request, $id)
    {
        $data = \App\Models\HasilPlagiarism::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function search(Request $request)
    {
    $search = $request->input('search');
    $results = [];

    $models = [
        \App\Models\RequestKelas::class => 'Request Kelas',
        \App\Models\KoreksiNilai::class => 'Koreksi Nilai',
        \App\Models\KoreksiKhs::class => 'Koreksi KHS',
        \App\Models\LegalisirRequest::class => 'Pengajuan Legalisir',
        \App\Models\TurnitinRequest::class => 'Cek Turnitin',
        \App\Models\hasilPlagiarism::class => 'Hasil Cek Plagiarisme',
        \App\Models\PindahProgramKuliah::class => 'Pindah Program Kuliah',
        \App\Models\PindahProgramStudi::class => 'Pindah Program Studi',
        \App\Models\PengunduranDiri::class => 'Pengunduran Diri',
        \App\Models\SeminarProposal::class => 'Seminar Proposal',
        \App\Models\SidangTugasAkhir::class => 'Sidang Tugas Akhir',
        \App\Models\KerjaPraktik::class => 'Surat Pengantar Kerja Praktik',
        \App\Models\Survey::class => 'Surat Pengantar Survey/Penelitian',
        \App\Models\Yudisium::class => 'Yudisium',
    ];

    foreach ($models as $model => $sumber) {
        foreach ($model::where('nama', 'like', "%{$search}%")
            ->orWhere('nim', 'like', "%{$search}%")
            ->get() as $item) {
            $item->sumber = $sumber;
            $results[] = $item;
        }
    }

    usort($results, function ($a, $b) {
        return strtotime($b->created_at) <=> strtotime($a->created_at);
    });

    return view('admin.search', ['data' => $results]);
    }

    public function lihatTurnitin($filename)
    {
    // Jangan tambahkan turnitin/ lagi di sini karena sudah termasuk di $filename
    $path = storage_path('app/private/' . $filename);

    if (!file_exists($path)) {
        abort(404, 'File tidak ditemukan: ' . $path);
    }

    return response()->file($path, [
        'Content-Disposition' => 'inline; filename="' . basename($filename) . '"',
        'Content-Type' => 'application/pdf'
    ]);
    }


}
