@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
<div class="relative w-full h-64 md:h-80 lg:h-96 mb-10 rounded-xl overflow-hidden shadow-md">
    <img src="{{ asset('images/UMB.jpg') }}" alt="Banner Fakultas Teknik" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h1 class="text-white text-2xl md:text-4xl font-bold text-center">Formulir Pelayanan Fakultas Teknik</h1>
    </div>
</div>

<div class="max-w-5xl mx-auto py-8 px-4">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-3">Pilih Jenis Pelayanan</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Pelayanan S1 --}}
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition duration-300">
            <h3 class="text-xl font-semibold text-blue-700 mb-4">Pelayanan S1</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('seminar-proposal.form') }}" class="text-blue-600 hover:underline">Seminar Proposal</a></li>
                <li><a href="{{ route('sidang-ta.form') }}" class="text-blue-600 hover:underline">Sidang Tugas Akhir</a></li>
                <li><a href="{{ route('kerja-praktik.form') }}" class="text-blue-600 hover:underline">Surat Pengantar - Kerja Praktik</a></li>
                <li><a href="{{ route('survey.form') }}" class="text-blue-600 hover:underline">Surat Pengantar - Survey/Penelitian</a></li>
                <li><a href="{{ route('yudisium.form') }}" class="text-blue-600 hover:underline">Yudisium</a></li>
            </ul>
        </div>

        {{-- Pelayanan S2 --}}
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition duration-300">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Pelayanan S2</h3>
            <ul class="text-gray-500">
                <li>Belum tersedia</li>
            </ul>
        </div>

        {{-- Pelayanan TU Online --}}
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition duration-300">
            <h3 class="text-xl font-semibold text-green-700 mb-4">Pelayanan TU Online</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('request-kelas.form') }}" class="text-green-600 hover:underline">Request Kelas</a></li>
                <li><a href="{{ route('koreksi-nilai.form') }}" class="text-green-600 hover:underline">Koreksi Nilai</a></li>
                <li><a href="{{ route('koreksi-khs.form') }}" class="text-green-600 hover:underline">Koreksi KHS</a></li>
                <li><a href="{{ route('legalisir.form') }}" class="text-green-600 hover:underline">Pengajuan Legalisir</a></li>
                <li><a href="{{ route('cek-turnitin.form') }}" class="text-green-600 hover:underline">Pengajuan Cek Turnitin</a></li>
                <li><a href="{{ route('hasil-plagiarism.form') }}" class="text-green-600 hover:underline">Permintaan Hasil Cek Plagiarism</a></li>
                <li><a href="{{ route('pindah-program-kuliah.form') }}" class="text-green-600 hover:underline">Pindah Program Kuliah</a></li>
                <li><a href="{{ route('pindah-program-studi.form') }}" class="text-green-600 hover:underline">Pindah Program Studi</a></li>
                <li><a href="{{ route('pengunduran-diri.form') }}" class="text-green-600 hover:underline">Pengajuan Pengunduran Diri</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
