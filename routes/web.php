<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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
Route::get('/tu-online/hasil-plagiarism', [FormController::class, 'hasilPlagiarismForm'])->name('hasil-plagiarism.form');
Route::post('/tu-online/hasil-plagiarism', [FormController::class, 'submitHasilPlagiarism'])->name('hasil-plagiarism.submit');

// Pelayanan TU Online - Pindah Program Kuliah
Route::get('/tu-online/pindah-program-kuliah', [FormController::class, 'pindahProgramKuliahForm'])->name('pindah-program-kuliah.form');
Route::post('/tu-online/pindah-program-kuliah', [FormController::class, 'submitPindahProgramKuliah'])->name('pindah-program-kuliah.submit');

// Pelayanan TU Online - Pindah Program Studi
Route::get('/tu-online/pindah-program-studi', [FormController::class, 'pindahProgramStudiForm'])->name('pindah-program-studi.form');
Route::post('/tu-online/pindah-program-studi', [FormController::class, 'submitPindahProgramStudi'])->name('pindah-program-studi.submit');

// Pelayanan TU Online - Pengunduran Diri
Route::get('/tu-online/pengunduran-diri', [FormController::class, 'pengunduranDiriForm'])->name('pengunduran-diri.form');
Route::post('/tu-online/pengunduran-diri', [FormController::class, 'submitPengunduranDiri'])->name('pengunduran-diri.submit');