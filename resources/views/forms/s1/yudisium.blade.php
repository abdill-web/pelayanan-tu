@extends('layouts.app')

@section('content')
{{-- Container Card untuk Form --}}
<div class="max-w-xl mx-auto bg-white p-6 md:p-8 shadow-lg rounded-xl">
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6 border-b pb-4">
        Form Pengajuan Yudisium
    </h2>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('s1.submitYudisium') }}" class="space-y-6">
        @csrf

        {{-- Nama --}}
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" id="nama"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   required placeholder="Masukkan nama lengkap Anda">
        </div>

        {{-- NIM --}}
        <div>
            <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">Nomor Induk Mahasiswa (NIM)</label>
            <input type="text" name="nim" id="nim"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   required placeholder="Masukkan NIM Anda">
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
            <input type="email" name="email" id="email"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   required placeholder="contoh@email.com">
        </div>

        {{-- Program Studi --}}
        <div>
            <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
            <input type="text" name="program_studi" id="program_studi"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   required placeholder="Masukkan program studi Anda">
        </div>

        {{-- Angkatan --}}
        <div>
            <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-1">Angkatan</label>
            <input type="text" name="angkatan" id="angkatan"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   required placeholder="Contoh: 2021">
        </div>

        {{-- IPK --}}
        <div>
            <label for="ipk" class="block text-sm font-medium text-gray-700 mb-1">Indeks Prestasi Kumulatif (IPK)</label>
            <input type="number" step="0.01" name="ipk" id="ipk"
                   class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   required placeholder="Contoh: 3.45">
        </div>

        {{-- Judul Tugas Akhir --}}
        <div>
            <label for="judul_ta" class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas Akhir</label>
            <textarea name="judul_ta" id="judul_ta" rows="3"
                      class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                      required placeholder="Masukkan judul tugas akhir Anda"></textarea>
        </div>

        {{-- Tombol Submit --}}
        <div class="pt-5">
            <button type="submit"
                    class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm 
                    text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Kirim Pengajuan Yudisium
            </button>
        </div>
    </form>
</div>
@endsection
