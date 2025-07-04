<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TurnitinController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminExportController;


// Route utama (Home)
Route::get('/', function () {
    return view('welcome');
})->name('home'); // ← Tambahkan penamaan route untuk 'home'

// ----------------------------
// Pelayanan S1
// ----------------------------

//sempro
Route::get('seminar-proposal', [FormController::class, 'seminarProposalForm'])->name('seminar-proposal.form');
Route::post('seminar-proposal', [FormController::class, 'submitSeminarProposal'])->name('seminar-proposal.submit');

//ta
Route::get('/sidang-ta', [FormController::class, 'sidangTAForm'])->name('sidang-ta.form');
Route::post('/sidang-ta', [FormController::class, 'submitSidangTA'])->name('sidang-ta.submit');

//surat pengantar - kp
Route::get('/surat-pengantar/kerja-praktik', [FormController::class, 'kerjaPraktikForm'])->name('kerja-praktik.form');
Route::post('/surat-pengantar/kerja-praktik', [FormController::class, 'submitKerjaPraktik'])->name('kerja-praktik.submit');

//surat pengantar - survey/penelitian
Route::get('/surat-pengantar/survey', [FormController::class, 'surveyForm'])->name('survey.form');
Route::post('/surat-pengantar/survey', [FormController::class, 'submitSurvey'])->name('survey.submit');

// Yudisium
Route::get('/s1/yudisium', [FormController::class, 'yudisiumForm'])->name('yudisium.form');
Route::post('/s1/yudisium', [FormController::class, 'submitYudisium'])->name('s1.submitYudisium');

// ----------------------------
// Pelayanan TU Online
// ----------------------------

// Pelayanan TU Online - Request Kelas
Route::get('/tu-online/request-kelas', [FormController::class, 'requestKelasForm'])->name('request-kelas.form');
Route::post('/tu-online/request-kelas', [FormController::class, 'submitRequestKelas'])->name('request-kelas.submit');

// Pelayanan TU Online - Koreksi Nilai
Route::get('/tu-online/koreksi-nilai', [FormController::class, 'koreksiNilaiForm'])->name('koreksi-nilai.form');
Route::post('/tu-online/koreksi-nilai', [FormController::class, 'submitKoreksiNilai'])->name('koreksi-nilai.submit');

// Pelayanan TU Online - Koreksi KHS
Route::get('/tu-online/koreksi-khs', [FormController::class, 'koreksiKhsForm'])->name('koreksi-khs.form');
Route::post('/tu-online/koreksi-khs', [FormController::class, 'submitKoreksiKhs'])->name('koreksi-khs.submit');

// Pelayanan TU Online - Legalisir
Route::get('/tu-online/legalisir', [FormController::class, 'legalisirForm'])->name('legalisir.form');
Route::post('/tu-online/legalisir', [FormController::class, 'submitLegalisir'])->name('legalisir.submit');

// Pelayanan TU Online - Cek Turnitin
Route::get('/tu-online/cek-turnitin', [FormController::class, 'cekTurnitinForm'])->name('cek-turnitin.form');
Route::post('/tu-online/cek-turnitin', [FormController::class, 'submitCekTurnitin'])->name('cek-turnitin.submit');

// Pelayanan TU Online - Hasil Plagiarism
Route::get('/tu-online/hasil-plagiarism', [FormController::class, 'showPermintaanTurnitin'])->name('hasil-plagiarism.form');
Route::post('/tu-online/hasil-plagiarism', [FormController::class, 'submitHasilPlagiarismForm'])->name('hasil-plagiarism.submit');

// Pelayanan TU Online - Pindah Program Kuliah
Route::get('/tu-online/pindah-program-kuliah', [FormController::class, 'pindahProgramKuliahForm'])->name('pindah-program-kuliah.form');
Route::post('/tu-online/pindah-program-kuliah', [FormController::class, 'submitPindahProgramKuliah'])->name('pindah-program-kuliah.submit');

// Pelayanan TU Online - Pindah Program Studi
Route::get('/tu-online/pindah-program-studi', [FormController::class, 'pindahProgramStudiForm'])->name('pindah-program-studi.form');
Route::post('/tu-online/pindah-program-studi', [FormController::class, 'submitPindahProgramStudi'])->name('pindah-program-studi.submit');

// Pelayanan TU Online - Pengunduran Diri
Route::get('/tu-online/pengunduran-diri', [FormController::class, 'pengunduranDiriForm'])->name('pengunduran-diri.form');
Route::post('/tu-online/pengunduran-diri', [FormController::class, 'submitPengunduranDiri'])->name('pengunduran-diri.submit');

// Untuk legalisir
Route::get('/legalisir/download/{id}', [FormController::class, 'downloadLegalisir'])->name('legalisir.download');

// Untuk cek Turnitin
Route::get('/turnitin/download/{filename}', [TurnitinController::class, 'download'])->name('turnitin.download');

// route admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/pindah-program-studi', [AdminController::class, 'pindahProgramStudi'])->name('admin.pindah-program-studi');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/pindah-program-kuliah', [AdminController::class, 'pindahProgramKuliah'])->name('admin.pindah-program-kuliah');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/pengunduran-diri', [AdminController::class, 'PengunduranDiri'])->name('admin.pengunduran-diri');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/legalisir', [AdminController::class, 'LegalisirRequest'])->name('admin.legalisir');
});

Route::get('/admin/seminar-proposal', [AdminController::class, 'seminarProposal'])->name('admin.seminar-proposal');

Route::get('/admin/sidang-ta', [AdminController::class, 'sidangTa'])->name('admin.sidang-ta');

Route::get('/admin/kerja-praktik', [AdminController::class, 'kerjaPraktik'])->name('admin.kerja-praktik');

Route::get('/admin/survey', [AdminController::class, 'survey'])->name('admin.survey');

Route::get('/admin/yudisium', [AdminController::class, 'yudisium'])->name('admin.yudisium');

Route::get('/admin/request-kelas', [AdminController::class, 'requestKelas'])->name('admin.request-kelas');

Route::get('/admin/koreksi-nilai', [AdminController::class, 'koreksiNilai'])->name('admin.koreksi-nilai');

Route::get('/admin/koreksi-khs', [AdminController::class, 'koreksiKHS'])->name('admin.koreksi-khs');

Route::get('/admin/turnitin-request', [AdminController::class, 'turnitinRequest'])->name('admin.turnitin-request');

Route::get('/admin/hasil-plagiarism', [AdminController::class, 'hasilPlagiarism'])->name('admin.hasil-plagiarism');

Route::get('/admin/pindah-program-studi', [AdminController::class, 'pindahProdiDetail'])->name('admin.pindah-program-studi');

Route::get('/admin/pindah-program-kuliah', [AdminController::class, 'pindahProgramKuliah'])->name('admin.pindah-program-kuliah');

Route::get('/admin/pengunduran-diri', [AdminController::class, 'pengunduranDiri'])->name('admin.pengunduran-diri');

Route::get('/admin/legalisir', [AdminController::class, 'legalisir'])->name('admin.legalisir');

Route::get('/admin/lihat-ijazah/{filename}', [App\Http\Controllers\AdminController::class, 'lihatIjazah'])->name('admin.lihat-ijazah');

Route::get('/admin/lihat-ijazah/{filename}', [AdminController::class, 'lihatIjazah'])->name('admin.lihat-ijazah');

// Menampilkan halaman daftar turnitin
Route::get('/admin/cek-turnitin', [AdminController::class, 'cekTurnitinView'])->name('admin.cek-turnitin');

Route::get('/admin/cek-turnitin/{filename}', [App\Http\Controllers\AdminController::class, 'Turnitin'])->name('admin.cek-turnitin');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/export/request-kelas', [AdminExportController::class, 'exportRequestKelas'])->name('admin.export.request-kelas');

Route::get('/admin/export/pindah-program-studi', [AdminExportController::class, 'exportPindahProgramStudi'])->name('admin.export.pindah-program-studi');

Route::get('/admin/export/pindah-program-kuliah', [AdminExportController::class, 'exportPindahProgramKuliah'])->name('admin.export.pindah-program-kuliah');

Route::get('/admin/export/pengunduran-diri', [AdminExportController::class, 'exportPengunduranDiri'])->name('admin.export.pengunduran-diri');

Route::get('/admin/export/legalisir-request', [AdminExportController::class, 'exportLegalisirRequest'])->name('admin.export.legalisir-request');

Route::get('/admin/export/seminar-proposal', [AdminExportController::class, 'exportSeminarProposal'])->name('admin.export.seminar-proposal');

Route::get('/admin/export/sidang-tugas-akhir', [AdminExportController::class, 'exportSidangTugasAkhir'])->name('admin.export.sidang-tugas-akhir');

Route::get('/admin/export/kerja-praktik', [AdminExportController::class, 'exportKerjaPraktik'])->name('admin.export.kerja-praktik');

Route::get('/admin/export/survey', [AdminExportController::class, 'exportSurvey'])->name('admin.export.survey');

Route::get('/admin/export/yudisium', [AdminExportController::class, 'exportYudisium'])->name('admin.export.yudisium');

Route::get('/admin/export/koreksi-nilai', [AdminExportController::class, 'exportKoreksiNilai'])->name('admin.export.koreksi-nilai');

Route::get('/admin/export/koreksi-khs', [AdminExportController::class, 'exportKoreksiKHS'])->name('admin.export.koreksi-khs');

Route::get('/admin/export/turnitin-request', [AdminExportController::class, 'exportTurnitinRequest'])->name('admin.export.turnitin-request');

Route::get('/admin/export/hasil-plagiarism', [AdminExportController::class, 'exportHasilPlagiarism'])->name('admin.export.hasil-plagiarism');

Route::put('/admin/pindah-prodi/status/{id}', [AdminController::class, 'updateStatusPindahProdi'])->name('admin.pindah-prodi.status');

Route::put('/admin/pindah-program-kuliah/status/{id}', [AdminController::class, 'updateStatusPindahProgramKuliah'])->name('admin.pindah-program-kuliah.status');

Route::put('/admin/pengunduran-diri/status/{id}', [AdminController::class, 'updateStatusPengunduranDiri'])->name('admin.pengunduran-diri.status');

Route::put('/admin/legalisir/status/{id}', [AdminController::class, 'updateStatusLegalisir'])->name('admin.legalisir.status');

Route::put('/admin/seminar-proposal/status/{id}', [AdminController::class, 'updateStatusSeminarProposal'])->name('admin.seminar-proposal.status');

Route::put('/admin/sidang-ta/status/{id}', [AdminController::class, 'updateStatusSidangTA'])->name('admin.sidang-ta.status');

Route::put('/admin/kerja-praktik/status/{id}', [AdminController::class, 'updateStatusKerjaPraktik'])->name('admin.kerja-praktik.status');

Route::put('/admin/survey/status/{id}', [AdminController::class, 'updateStatusSurvey'])->name('admin.survey.status');

Route::put('/admin/yudisium/status/{id}', [AdminController::class, 'updateStatusYudisium'])->name('admin.yudisium.status');

Route::put('/admin/request-kelas/status/{id}', [AdminController::class, 'updateStatusRequestKelas'])->name('admin.request-kelas.status');

Route::put('/admin/koreksi-nilai/status/{id}', [AdminController::class, 'updateStatusKoreksiNilai'])->name('admin.koreksi-nilai.status');

Route::put('/admin/koreksi-khs/status/{id}', [AdminController::class, 'updateStatusKoreksiKHS'])->name('admin.koreksi-khs.status');

Route::put('/admin/turnitin-request/status/{id}', [AdminController::class, 'updateStatusTurnitinRequest'])->name('admin.turnitin-request.status');

Route::put('/admin/hasil-plagiarism/status/{id}', [AdminController::class, 'updateStatusHasilPlagiarism'])->name('admin.hasil-plagiarism.status');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/search', [AdminController::class, 'search']);


Route::get('/admin/lihat-turnitin/{filename}', [AdminController::class, 'lihatTurnitin'])
    ->where('filename', '.*') // ini penting agar filename dengan slash tidak error
    ->name('admin.lihat-turnitin');


