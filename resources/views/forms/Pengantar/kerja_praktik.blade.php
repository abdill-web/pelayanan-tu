@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white px-6 sm:px-10 lg:px-12 py-10 shadow-2xl rounded-3xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">
            Surat Pengantar - Kerja Praktik
        </h2>

        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-lg mb-8 shadow">
                <div class="font-semibold mb-1">✅ Sukses!</div>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('kerja-praktik.submit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-x-8">
            @csrf

            {{-- Email --}}
            <div class="md:col-span-2">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 shadow-inner focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="contoh@email.com">
            </div>

            {{-- Nama --}}
            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="nama" id="nama"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 shadow-inner focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Masukkan nama lengkap Anda">
            </div>

            {{-- NIM --}}
            <div>
                <label for="nim" class="block text-sm font-semibold text-gray-700 mb-2">NIM</label>
                <input type="text" name="nim" id="nim"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 shadow-inner focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Masukkan NIM Anda">
            </div>

            {{-- Tujuan Surat --}}
            <div class="md:col-span-2">
                <label for="tujuan_surat" class="block text-sm font-semibold text-gray-700 mb-2">Tujuan Surat</label>
                <input type="text" name="tujuan_surat" id="tujuan_surat"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 shadow-inner focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Cth: Magang Mandiri, Kerja Praktik">
            </div>

            {{-- Nama Perusahaan --}}
            <div class="md:col-span-2">
                <label for="nama_perusahaan" class="block text-sm font-semibold text-gray-700 mb-2">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 shadow-inner focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Masukkan nama perusahaan">
            </div>

            {{-- Alamat Perusahaan --}}
            <div class="md:col-span-2">
                <label for="alamat_perusahaan" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap Perusahaan</label>
                <textarea name="alamat_perusahaan" id="alamat_perusahaan" rows="3"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 shadow-inner focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Masukkan alamat lengkap perusahaan"></textarea>
            </div>

            {{-- Program Studi --}}
            <div class="md:col-span-2">
                <label for="program_studi" class="block text-sm font-semibold text-gray-700 mb-2">Program Studi</label>
                <input type="text" name="program_studi" id="program_studi"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 shadow-inner focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Cth: Teknik Informatika S1">
            </div>

            {{-- Lama Magang --}}
            <div class="md:col-span-2">
                <label for="lama_magang" class="block text-sm font-semibold text-gray-700 mb-2">Periode / Lama Magang</label>
                <input type="text" name="lama_magang" id="lama_magang"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 shadow-inner focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Cth: 3 Bulan (Januari - Maret 2025)">
            </div>

            {{-- Submit --}}
            <div class="md:col-span-2 pt-6">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition duration-200">
                    Kirim Pengajuan Surat
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
