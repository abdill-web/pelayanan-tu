@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<div class="relative w-full h-64 md:h-80 lg:h-96 mb-10 rounded-3xl overflow-hidden shadow-xl">
    <img src="{{ asset('images/UMB.jpg') }}" alt="Banner Fakultas Teknik" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center">
        <h1 class="text-white text-3xl md:text-5xl font-extrabold text-center drop-shadow-lg">
            Formulir Pelayanan Fakultas Teknik
        </h1>
    </div>
</div>

<div class="max-w-6xl mx-auto px-6 py-10">
    <h2 class="text-4xl font-bold text-gray-800 mb-10 border-b-4 border-blue-600 pb-4">
        Pilih Jenis Pelayanan
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {{-- Pelayanan S1 --}}
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl p-6 transition duration-300 border-t-4 border-blue-600">
            <h3 class="text-2xl font-bold text-blue-700 mb-4">
                Pelayanan S1
            </h3>
            <ul class="space-y-3">
                <li><a href="{{ route('seminar-proposal.form') }}" class="text-blue-600 hover:underline">Seminar Proposal</a></li>
                <li><a href="{{ route('sidang-ta.form') }}" class="text-blue-600 hover:underline">Sidang Tugas Akhir</a></li>
                <li><a href="{{ route('kerja-praktik.form') }}" class="text-blue-600 hover:underline">Surat Pengantar - Kerja Praktik</a></li>
                <li><a href="{{ route('survey.form') }}" class="text-blue-600 hover:underline">Surat Pengantar - Survey/Penelitian</a></li>
                <li><a href="{{ route('yudisium.form') }}" class="text-blue-600 hover:underline">Yudisium</a></li>
            </ul>
        </div>

        {{-- Pelayanan S2 --}}
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl p-6 transition duration-300 border-t-4 border-gray-500">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">
                Pelayanan S2
            </h3>
            <p class="text-gray-500">Belum tersedia</p>
        </div>

        {{-- Pelayanan TU Online --}}
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl p-6 transition duration-300 border-t-4 border-green-600">
            <h3 class="text-2xl font-bold text-green-700 mb-4">
                Pelayanan TU Online
            </h3>
            <ul class="space-y-3">
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

{{-- Hubungi Kami Section --}}
<div class="max-w-3xl mx-auto mt-16 mb-10 bg-white p-8 rounded-2xl shadow-lg text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
    <p class="mb-6 text-gray-600">Jika ada pertanyaan lebih lanjut, silakan hubungi kami melalui:</p>
    <ul class="space-y-4 text-blue-600 text-lg font-medium">
        <li>
            <a href="https://www.instagram.com/ft.umb/" target="_blank" class="hover:underline">
                Instagram Fakultas Teknik
            </a>
        </li>
        <li>
            <a href="https://mercubuana.ac.id/fakultas-teknik" target="_blank" class="hover:underline">
                Website Resmi Fakultas Teknik
            </a>
        </li>
        <li>
            <a href="https://wa.me/6285173018802" target="_blank" class="hover:underline">
                WhatsApp TU Fakultas Teknik
            </a>
        </li>
    </ul>
</div>

@endsection
