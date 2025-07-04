@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Admin</h1>

<form method="GET" action="/admin/search/" class="mb-6">
    <div class="flex flex-col md:flex-row items-start md:items-center gap-2">
        <input
            type="text"
            id="search"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari Nama atau NIM..."
            class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-1/3"
        >
        <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
        >
            Cari
        </button>
    </div>
</form>
    
    <!-- End Kolom Pencarian -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Pindah Program Studi</h2>
            <p>Total: {{ $pindahProdi->count() }} pengajuan</p>
            <a href="{{ route('admin.pindah-program-studi') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Pindah Program Kuliah</h2>
            <p>Total: {{ $pindahKuliah->count() }} pengajuan</p>
            <a href="{{ route('admin.pindah-program-kuliah') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Pengunduran Diri</h2>
            <p>Total: {{ $pengunduranDiri->count() }} pengajuan</p>
            <a href="{{ route('admin.pengunduran-diri') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Legalisir</h2>
            <p>Total: {{ $legalisir->count() }} pengajuan</p>
            <a href="{{ route('admin.legalisir') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Seminar Proposal</h2>
            <p>Total: {{ $seminarProposal->count() }} pengajuan</p>
            <a href="{{ route('admin.seminar-proposal') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Sidang Tugas Akhir</h2>
            <p>Total: {{ $sidangTa->count() }} pengajuan</p>
            <a href="{{ route('admin.sidang-ta') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Kerja Praktik</h2>
            <p>Total: {{ $kerjaPraktik->count() }} pengajuan</p>
            <a href="{{ route('admin.kerja-praktik') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Survey/Penelitian</h2>
            <p>Total: {{ $survey->count() }} pengajuan</p>
            <a href="{{ route('admin.survey') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Yudisium</h2>
            <p>Total: {{ $yudisium->count() }} pengajuan</p>
            <a href="{{ route('admin.yudisium') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Request Kelas</h2>
            <p>Total: {{ $requestKelas->count() }} pengajuan</p>
            <a href="{{ route('admin.request-kelas') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Koreksi Nilai</h2>
            <p>Total: {{ $koreksiNilai->count() }} pengajuan</p>
            <a href="{{ route('admin.koreksi-nilai') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Koreksi KHS</h2>
            <p>Total: {{ $koreksiKhs->count() }} pengajuan</p>
            <a href="{{ route('admin.koreksi-khs') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Cek Turnitin</h2>
            <p>Total: {{ $turnitinRequest->count() }} pengajuan</p>
            <a href="{{ route('admin.turnitin-request') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold text-blue-700 mb-2">Hasil Plagiarism</h2>
            <p>Total: {{ $hasilPlagiarism->count() }} pengajuan</p>
            <a href="{{ route('admin.hasil-plagiarism') }}" class="text-blue-500 hover:underline text-sm">Lihat detail</a>
        </div>
    </div>
</div>
@endsection
